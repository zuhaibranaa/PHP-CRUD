<?php
include('./header.php');
$page = isset($_GET['page']) ? $_GET['page'] : 0;
?>
    <div style="margin: 0% 10%" class="container">
        <table>
            <thead>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Password</th>
            <th>Token</th>
            <th>Image</th>
            <th>Actions</th>
            </thead>
            <tbody id="tbody">
            <?php
            include('actions/connection.php');
            $records = $con->query('SELECT * FROM DATA');
            $records = $records->fetch_all();
            $max_records = 2;
            $start_records = $page * $max_records;
            $final_record = $start_records + $max_records;
            if ($final_record > sizeof($records)) {
                $final_record = sizeof($records);
            }
            for ($i = $start_records; $i < $final_record; $i++) {
                echo "<tr>";
                echo "<td>" . $records[$i][0] . "</td>";
                echo "<td>" . $records[$i][1] . "</td>";
                echo "<td>" . $records[$i][2] . "</td>";
                echo "<td>" . $records[$i][3] . "</td>";
                echo "<td>" . $records[$i][4] . "</td>";
                echo "<td>" . $records[$i][7] . "</td>";
                echo "<td>";
                foreach (json_decode($records[$i][5]) as $image) {
                    echo "<img class='recImg' src=\"images/" . $image . "\" height=\"70px\">";
                };
                echo "</td>";
                echo "<td>
                    <span><a href='/PHP-CRUD/?id=" . $records[$i][0] . "'><i class='mdi mdi-pencil text-white'></i></button></span>
                    <span><a href='actions/delete_record.php?id=" . $records[$i][0] . "'><i class='mdi mdi-delete text-danger'></i></button></span>
                    </td>";
                echo "</tr>";
            }
            ?>

            </tbody>
        </table>
    </div>
<?php
if (sizeof($records) > $max_records) {
    $count_pages = is_float(sizeof($records) / $max_records) ? (int)(sizeof($records) / $max_records) : (int)(sizeof($records) / $max_records) - 1;
    ?>

    <div class="d-flex justify-content-center">
        <nav aria-label="Page navigation">
            <ul class="pagination">
                <?php if ($page) { ?>
                    <li class="page-item"><a class="page-link" href="records.php?page=0">First Page</a></li>
                <?php }
                for ($i = 0; $i < $count_pages + 1; $i++) { ?>
                    <li class='page-item <?php echo ((int)($page) === $i) ? ' active' : 'inactive' ?>'>
                        <a class='page-link'
                           href='records.php?page=<?php echo $i ?>'>
                            <?php echo $i + 1 ?>
                        </a></li>
                    <?php
                }
                if ((int)($page) !== $count_pages) { ?>
                    <li class="page-item"><a class="page-link" href="records.php?page=<?php echo $count_pages ?>">Last
                            Page</a></li>
                <?php } ?>
            </ul>
        </nav>
    </div>
<?php }
include('./footer.php'); ?>