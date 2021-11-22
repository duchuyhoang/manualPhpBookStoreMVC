<?php

// require_once dirname(__FILE__) . "/../db.php";
require_once dirname(__FILE__) . "/../Model/Book.php";
require_once dirname(__FILE__) . "/../Model/Category.php";

require_once dirname(__FILE__) . "/BaseDao.php";
require_once dirname(__FILE__) . "/../DBConnector.php";

class BookDao extends DBConnector
{
    private $listBook;

    public function __construct()
    {
        // parent::__construct();
        DBConnector::connectDB();
        $this->listBook = array();
    }

    public function getAll()
    {
        $query = "SELECT DISTINCT  book.*,
            GROUP_CONCAT(distinct category.cat_name SEPARATOR '////') as categoryName,
            GROUP_CONCAT(distinct book_category.id_book_category SEPARATOR '////') as categoryId,
            GROUP_CONCAT(category.delFlag SEPARATOR '////') as categoryDelFlag,
            (SELECT GROUP_CONCAT(book_image.delFlag SEPARATOR '////') FROM book_image WHERE book_image.id_book=book.id_book) as bookImageDelFlag,
            (SELECT GROUP_CONCAT(book_image.url SEPARATOR '////') FROM book_image WHERE book_image.id_book=book.id_book) as bookImageUrl,
            (SELECT GROUP_CONCAT(book_image.id_image SEPARATOR '////') FROM book_image WHERE book_image.id_book=book.id_book) as bookImageId,
            manufacture.name as manufactureName,manufacture.delFlag as manufactureDelFlag,
            author.name as authorName,author.delFlag as authorDelFlag,author.maxim as authorMaxim,
        author.birthday as authorBirthday,author.address as authorAddress
            FROM book
            LEFT JOIN book_category ON book.id_book=book_category.id_book
            LEFT JOIN category ON category.id_category=book_category.id_book_category
            LEFT JOIN manufacture ON manufacture.id_manufacture=book.id_book_manufacture
            LEFT JOIN author ON author.id_author=book.id_author
            WHERE book.status=1 GROUP BY book.id_book";
        // $stmt=$conn;
        $stmt = parent::$db->query($query);
        $list_books = $stmt->fetchAll();
        $list = array();
        foreach ($list_books as $book) {
            array_push($list, new Book(
                $book["id_book"],
                $book["name"],
                $book["price"],
                $book["quantity"],
                $book["status"],
                $book["description"],
                $book["categoryId"],
                $book["categoryName"],
                $book["categoryDelFlag"],
                $book["id_book_manufacture"],
                $book["manufactureName"],
                $book["manufactureDelFlag"],
                $book["id_author"],
                $book["authorName"],
                $book["authorMaxim"],
                $book["authorAddress"],
                $book["authorDelFlag"],
                $book["authorBirthday"],
                $book["bookImageId"],
                $book["bookImageUrl"],
                $book["bookImageDelFlag"],
                $book["createAt"],
                $book["sale"],
            ));
        }
        return $list;
    }

    public function getById(int $id)
    {
        $query = "SELECT DISTINCT book.*,
        GROUP_CONCAT(distinct category.cat_name SEPARATOR '////') as categoryName,
        GROUP_CONCAT(distinct book_category.id_book_category SEPARATOR '////') as categoryId,
        GROUP_CONCAT(category.delFlag SEPARATOR '////') as categoryDelFlag,
        Book_Image.bookImageDelFlag as bookImageDelFlag,
        Book_Image.bookImageUrl as bookImageUrl,
        Book_Image.bookImageId as bookImageId,
        manufacture.name as manufactureName,manufacture.delFlag as manufactureDelFlag,
        author.name as authorName,author.delFlag as authorDelFlag,author.maxim as authorMaxim,
        author.birthday as authorBirthday,author.address as authorAddress
        FROM 
             (
        SELECT 
        GROUP_CONCAT(book_image.delFlag SEPARATOR '////') as bookImageDelFlag,
        GROUP_CONCAT( book_image.url SEPARATOR '////') as bookImageUrl,
        GROUP_CONCAT( book_image.id_image SEPARATOR '////') as bookImageId
        FROM book_image LEFT JOIN book ON book_image.id_book=book.id_book WHERE book_image.id_book=?
        ) as Book_Image
        ,book
    
        LEFT JOIN book_category ON book.id_book=book_category.id_book
        LEFT JOIN category ON category.id_category=book_category.id_book_category
        LEFT JOIN manufacture ON manufacture.id_manufacture=book.id_book_manufacture
        LEFT JOIN author ON author.id_author=book.id_author
        WHERE book.id_book = ? AND book.status=1 GROUP BY book.id_book;
        ";
        $stmt = parent::$db->prepare($query);
        $stmt->bindParam(1, $id);
        $stmt->bindParam(2, $id);
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $selectedBook = NULL;
        $book = $stmt->fetchAll();

        if ($book) {
            $selectedBook =
                new Book(
                    $book[0]["id_book"],
                    $book[0]["name"],
                    $book[0]["price"],
                    $book[0]["quantity"],
                    $book[0]["status"],
                    $book[0]["description"],
                    $book[0]["categoryId"],
                    $book[0]["categoryName"],
                    $book[0]["categoryDelFlag"],
                    $book[0]["id_book_manufacture"],
                    $book[0]["manufactureName"],
                    $book[0]["manufactureDelFlag"],
                    $book[0]["id_author"],
                    $book[0]["authorName"],
                    $book[0]["authorMaxim"],
                    $book[0]["authorAddress"],
                    $book[0]["authorDelFlag"],
                    $book[0]["authorBirthday"],
                    $book[0]["bookImageId"],
                    $book[0]["bookImageUrl"],
                    $book[0]["bookImageDelFlag"],
                    $book[0]["createAt"],
                    $book[0]["sale"],
                );
        }

        return $selectedBook;
    }


    public function getProductByPagination(int $limit, int $offset)
    {
    }

    public function insertProduct(Book $book)
    {
        $query = "INSERT INTO `book`
    (`id_book`,`name`,`quantity`,`price`,`description`,`id_book_manufacture`,`id_author`,`createAt`)
    VALUES
    (?,?,?,?,?,?,?,now());
    ";

        $stmt = parent::$db->prepare($query);
        $stmt->bindParam(1, $book->getId_book());
        $stmt->bindParam(2, $book->getName());
        $stmt->bindParam(3, $book->getQuantity());
        $stmt->bindParam(4, $book->getPrice());
        $stmt->bindParam(5, $book->getDescription());
        $stmt->bindParam(6, $book->getManufacture()->getId_manufacture());
        $stmt->bindParam(7, $book->getAuthor()->getId_author());
        $stmt->execute();
        return parent::$db->lastInsertId();
    }

    public function insertBookImages($id_book, $listBookImage)
    {
        $insertData = array();
        for ($i = 0; $i < count($listBookImage); $i++) {
            $questionMark[] = '(' . placeholders('?', 2) . ')';
            $insertData = array_merge($insertData, array($listBookImage[$i]->getId_book(), $listBookImage[$i]->getUrl()));
        }
        $query = "INSERT INTO book_image(id_book,url) VALUES " . implode(',', $questionMark);
        $stmt = parent::$db->prepare($query);
        $stmt->execute($insertData);
    }

    public function getLatestBook()
    {
        $query = "SELECT DISTINCT  book.*,
    GROUP_CONCAT(distinct category.cat_name SEPARATOR '////') as categoryName,
    GROUP_CONCAT(distinct book_category.id_book_category SEPARATOR '////') as categoryId,
    GROUP_CONCAT(category.delFlag SEPARATOR '////') as categoryDelFlag,
    (SELECT GROUP_CONCAT(book_image.delFlag SEPARATOR '////') FROM book_image WHERE book_image.id_book=book.id_book) as bookImageDelFlag,
    (SELECT GROUP_CONCAT(book_image.url SEPARATOR '////') FROM book_image WHERE book_image.id_book=book.id_book) as bookImageUrl,
    (SELECT GROUP_CONCAT(book_image.id_image SEPARATOR '////') FROM book_image WHERE book_image.id_book=book.id_book) as bookImageId,
    manufacture.name as manufactureName,manufacture.delFlag as manufactureDelFlag,
    author.name as authorName,author.delFlag as authorDelFlag,author.maxim as authorMaxim,
author.birthday as authorBirthday,author.address as authorAddress
    FROM book
    LEFT JOIN book_category ON book.id_book=book_category.id_book
    LEFT JOIN category ON category.id_category=book_category.id_book_category
    LEFT JOIN manufacture ON manufacture.id_manufacture=book.id_book_manufacture
    LEFT JOIN author ON author.id_author=book.id_author
    WHERE book.status=1 GROUP BY book.id_book ORDER BY book.createAt DESC LIMIT 10;
    ";
        $stmt = parent::$db->prepare($query);
        $stmt->execute();
        $listQueries = $stmt->fetchAll();
        $listBook = array();
        foreach ($listQueries as $query) {
            $listBook[] = new Book(
                $query["id_book"],
                $query["name"],
                $query["price"],
                $query["quantity"],
                $query["status"],
                $query["description"],
                $query["categoryId"],
                $query["categoryName"],
                $query["categoryDelFlag"],
                $query["id_book_manufacture"],
                $query["manufactureName"],
                $query["manufactureDelFlag"],
                $query["id_author"],
                $query["authorName"],
                $query["authorMaxim"],
                $query["authorAddress"],
                $query["authorDelFlag"],
                $query["authorBirthday"],
                $query["bookImageId"],
                $query["bookImageUrl"],
                $query["bookImageDelFlag"],
                $query["createAt"],
                $query["sale"],

            );
        }
        return $listBook;
    }

    public function getProductByKeyword($keyword)
    {

        $query = "SELECT DISTINCT  book.*,
        GROUP_CONCAT(distinct category.cat_name SEPARATOR '////') as categoryName,
        GROUP_CONCAT(distinct book_category.id_book_category SEPARATOR '////') as categoryId,
        GROUP_CONCAT(category.delFlag SEPARATOR '////') as categoryDelFlag,
        (SELECT GROUP_CONCAT(book_image.delFlag SEPARATOR '////') FROM book_image WHERE book_image.id_book=book.id_book) as bookImageDelFlag,
        (SELECT GROUP_CONCAT(book_image.url SEPARATOR '////') FROM book_image WHERE book_image.id_book=book.id_book) as bookImageUrl,
        (SELECT GROUP_CONCAT(book_image.id_image SEPARATOR '////') FROM book_image WHERE book_image.id_book=book.id_book) as bookImageId,
        manufacture.name as manufactureName,manufacture.delFlag as manufactureDelFlag,
        author.name as authorName,author.delFlag as authorDelFlag,author.maxim as authorMaxim,
    author.birthday as authorBirthday,author.address as authorAddress
        FROM book
        LEFT JOIN book_category ON book.id_book=book_category.id_book
        LEFT JOIN category ON category.id_category=book_category.id_book_category
        LEFT JOIN manufacture ON manufacture.id_manufacture=book.id_book_manufacture
        LEFT JOIN author ON author.id_author=book.id_author
        WHERE book.status=1 
        AND book.name LIKE CONCAT('%',?,'%') OR manufacture.name LIKE CONCAT('%',?,'%') OR author.name like CONCAT('%',?,'%')
        GROUP BY book.id_book;";

        $stmt = parent::$db->prepare($query);

        $stmt->bindParam(1, $keyword);
        $stmt->bindParam(2, $keyword);
        $stmt->bindParam(3, $keyword);

        $stmt->execute();
        $listQueries = $stmt->fetchAll();
        $listBook = array();
        foreach ($listQueries as $query) {
            $listBook[] = new Book(
                $query["id_book"],
                $query["name"],
                $query["price"],
                $query["quantity"],
                $query["status"],
                $query["description"],
                $query["categoryId"],
                $query["categoryName"],
                $query["categoryDelFlag"],
                $query["id_book_manufacture"],
                $query["manufactureName"],
                $query["manufactureDelFlag"],
                $query["id_author"],
                $query["authorName"],
                $query["authorMaxim"],
                $query["authorAddress"],
                $query["authorDelFlag"],
                $query["authorBirthday"],
                $query["bookImageId"],
                $query["bookImageUrl"],
                $query["bookImageDelFlag"],
                $query["createAt"],
                $query["sale"],

            );
        }
        return $listBook;
    }



    public function getBookByListId($listBookId)
    {
        try {
            $placeholderString = "";
            if (count($listBookId) > 0) {
                $placeholderString .= "AND ";
                for ($i = 0; $i < count($listBookId); $i++) {
                    if ($i < count($listBookId) - 1)
                        $placeholderString .= " book.id_book=? OR";
                    else
                        $placeholderString .= " book.id_book=?";
                }
            }
            $query = "SELECT DISTINCT book.*,
    GROUP_CONCAT(distinct category.cat_name SEPARATOR '////') as categoryName,
    GROUP_CONCAT(distinct book_category.id_book_category SEPARATOR '////') as categoryId,
    GROUP_CONCAT(category.delFlag SEPARATOR '////') as categoryDelFlag,
    (SELECT GROUP_CONCAT(book_image.delFlag SEPARATOR '////') FROM book_image WHERE book_image.id_book=book.id_book) as bookImageDelFlag,
    (SELECT GROUP_CONCAT(book_image.url SEPARATOR '////') FROM book_image WHERE book_image.id_book=book.id_book) as bookImageUrl,
    (SELECT GROUP_CONCAT(book_image.id_image SEPARATOR '////') FROM book_image WHERE book_image.id_book=book.id_book) as bookImageId,
    manufacture.name as manufactureName,manufacture.delFlag as manufactureDelFlag,
    author.name as authorName,author.delFlag as authorDelFlag,author.maxim as authorMaxim,
author.birthday as authorBirthday,author.address as authorAddress
    FROM book
    LEFT JOIN book_category ON book.id_book=book_category.id_book
    LEFT JOIN category ON category.id_category=book_category.id_book_category
    LEFT JOIN manufacture ON manufacture.id_manufacture=book.id_book_manufacture
    LEFT JOIN author ON author.id_author=book.id_author
    WHERE book.status=1 {$placeholderString} GROUP BY book.id_book;";



            $stmt = parent::$db->prepare($query);
            $stmt->execute($listBookId);
            $listQueries = $stmt->fetchAll();
            $listBook = array();
            foreach ($listQueries as $query) {
                $listBook[] = new Book(
                    $query["id_book"],
                    $query["name"],
                    $query["price"],
                    $query["quantity"],
                    $query["status"],
                    $query["description"],
                    $query["categoryId"],
                    $query["categoryName"],
                    $query["categoryDelFlag"],
                    $query["id_book_manufacture"],
                    $query["manufactureName"],
                    $query["manufactureDelFlag"],
                    $query["id_author"],
                    $query["authorName"],
                    $query["authorMaxim"],
                    $query["authorAddress"],
                    $query["authorDelFlag"],
                    $query["authorBirthday"],
                    $query["bookImageId"],
                    $query["bookImageUrl"],
                    $query["bookImageDelFlag"],
                    $query["createAt"],
                    $query["sale"],

                );
            }
            return $listBook;
        } catch (PDOException $e) {
        }
    }




    public function editProduct(Book $book)
    {

        $query = "UPDATE book
        SET name= ?,quantity=?,price=?,description=?,id_book_manufacture=?,id_author=?,status=?,sale=? WHERE id_book=?";

        $stmt = parent::$db->prepare($query);
        $stmt->bindParam(1, $book->getName());
        $stmt->bindParam(2, $book->getQuantity());
        $stmt->bindParam(3, $book->getPrice());
        $stmt->bindParam(4, $book->getDescription());
        $stmt->bindParam(5, $book->getManufacture()->getId_manufacture());
        $stmt->bindParam(6, $book->getAuthor()->getId_author());
        $stmt->bindParam(7, $book->getStatus());
        $stmt->bindParam(8, $book->getSale());
        $stmt->bindParam(9, $book->getId_book());

        $stmt->execute();
    }
}
