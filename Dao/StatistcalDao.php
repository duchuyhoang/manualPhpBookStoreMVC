<?php
require_once dirname(__FILE__) . "/../Model/StatistcalBookByMonth.php";
require_once dirname(__FILE__) . "/../Model/Book.php";

// require_once dirname(__FILE__) ."/"

class StatistcalDao extends DBConnector
{
    public function __construct()
    {
        DBConnector::connectDB();
        // parent::__construct();
    }


    public function statistcalBookByThisMonth(
        // Datetime $startDate,Datetime $endDate
    )
    {
        try {
            $startDate = new DateTime(date('Y') . "-" . date("m") . "-1 00:00:00");
            $startDate->modify('-6 month');

            $currentDate = date("Y-m-t");
            $lastdate = new Datetime(date("Y-m-t", strtotime($currentDate)) . " 23:59:59");

            $query = "SELECT SUM(cart_item.quantity*cart_item.price) as totalPrice,
    orderCategory.*,SUM(cart_item.quantity) as totalQuantity,
    book.*,manufacture.id_manufacture as idManufacture,manufacture.name as manufactureName,
    author.*,author.id_author as idAuthor,author.name as authorName,cart_item.createAt as cartCreateAt
    FROM
     (SELECT 
    group_concat(category.cat_name SEPARATOR '////') 
    as list_book_category_name,
    group_concat(category.delFlag SEPARATOR '////') as list_book_category_del_flag,
    book.id_book as idBook,
    book.name as bookName,
    group_concat(category.id_category SEPARATOR '////') as list_book_category_id FROM category INNER JOIN book_category 
    ON category.id_category=book_category.id_book_category
    INNER JOIN book ON book.id_book=book_category.id_book GROUP BY book_category.id_book
    ) 
    as orderCategory INNER JOIN cart_item ON orderCategory.idBook=cart_item.id_book
    LEFT JOIN book ON book.id_book=cart_item.id_book 
    LEFT JOIN author ON book.id_author=author.id_author
    LEFT JOIN manufacture ON book.id_book_manufacture=manufacture.id_manufacture
    WHERE cart_item.createAt between ? and ? 
    GROUP BY cart_item.id_book,YEAR(cart_item.createAt), MONTH(cart_item.createAt)";

            $stmt = parent::$db->prepare($query);
            $stmt->bindParam(1, $startDate->format('Y-m-d H:i:s'));
            $stmt->bindParam(2, $lastdate->format('Y-m-d H:i:s'));
            $stmt->execute();
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $listBookMonthStastical = [];
            $listQueryStatitscals = $stmt->fetchAll();

            foreach ($listQueryStatitscals as $listQueryStatitscal) {
                $listBookMonthStastical[] = new StatistcalBookByMonth(
                    new Book(
                        $listQueryStatitscal["idBook"],
                        $listQueryStatitscal["bookName"],
                        $listQueryStatitscal["price"],
                        $listQueryStatitscal["quantity"],
                        $listQueryStatitscal["status"],
                        $listQueryStatitscal["description"],
                        $listQueryStatitscal["list_book_category_id"],
                        $listQueryStatitscal["list_book_category_name"],
                        $listQueryStatitscal["list_book_category_del_flag"],
                        $listQueryStatitscal["idManufacture"],
                        $listQueryStatitscal["manufactureName"],
                        0,
                        $listQueryStatitscal["idAuthor"],
                        $listQueryStatitscal["authorName"],
                        $listQueryStatitscal["maxim"],
                        $listQueryStatitscal["address"],
                        0,
                        $listQueryStatitscal["birthday"],
                        "",
                        "",
                        "",
                        $listQueryStatitscal["createAt"],
                        $listQueryStatitscal["sale"]
                    ),
                    $listQueryStatitscal["totalPrice"],
                    $listQueryStatitscal["totalQuantity"],
                    new DateTime($listQueryStatitscal["cartCreateAt"])
                );
            }




$a=1;

return $listBookMonthStastical;

        } catch (Exception $e) {
            return null;
        } catch (PDOException $e) {
            return null;
        }
    }
}
