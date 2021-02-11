<?php
    include '../elems/init.php';
    
    if(!empty($_SESSION['auth'])){
        function showPage($link)
        {
            $query = "SELECT id,title,url FROM pages";
            $result = mysqli_query($link,$query);

            for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);

            $title = 'admin main panel';
            $content = '<table>
                <tr>
                <th>title</th>
                <th>url</th>
                <th>edit</th>
                <th>delete</th>
                </tr>';

            foreach ($data as $value){
                $content .= "<tr>
                    <td>{$value['title']}</td>
                    <td>{$value['url']}</td>
                    <td><a href =\"edit.php?id={$value['id']}\">edit</a></td>
                    <td><a href =\"?delete={$value['id']}\">delete</a></td>
                </tr>";

            }   
        $content .='</table>';

        $addPage = '<a href ="\admin\add.php">insert new page</a>';
        include 'elems\layout.php';
        }
    
    deletePage($link);
    showPage($link);
    
    }else{ include_once 'elems/login.php'; }
    
        function deletePage($link)
        {    
            if(isset($_GET['delete'])){
                $id = $_GET['delete'];
                $query = "DELETE FROM pages WHERE id=$id";
                mysqli_query($link,$query);
            }
        }