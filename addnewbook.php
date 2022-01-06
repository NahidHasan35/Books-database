<?php
			$booksJson = file_get_contents('books.json');
			$book_array = json_decode($booksJson, true);
            $sw = false;

            if($_POST['avialable'] == 'available'){
                $sw = true;
            }
            else{
                $sw = false;
            }

            $book_array[] = array(
                'title' => $_POST['title'],
                'author' => $_POST['author'],
                'isbn' => $_POST['isbn'],
                'pages' => $_POST['pages'],
                'available' => $sw
            );
            $jsonData = json_encode($book_array);
            file_put_contents('books.json', $jsonData);
            header("Location: /index.php");
             exit();
?>