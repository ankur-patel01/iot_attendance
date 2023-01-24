    <div class="table-responsive-sm" style="max-height: 870px;">
    <table class="table table table-striped">
        <thead class="table-primary ">
            <tr>
                <th scope="col">Card UID</th>
             
            </tr>
        </thead>
        <tbody class="table-secondary ">

            <?php
            require 'connectDB.php';

            $sql = "SELECT * FROM new_users ORDER BY id DESC";
            $result = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($result, $sql)) {
                echo '<p class="error">SQL Error</p>';
            } else {
                mysqli_stmt_execute($result);
                $resultl = mysqli_stmt_get_result($result);
                if (mysqli_num_rows($resultl) > 0) {
                    while ($row = mysqli_fetch_assoc($resultl)) {
            ?>
                        <tr>
                            <th scope="row">
                                <?php
                                if ($row['card_select'] == 1) {
                                    echo "<span><i class='glyphicon glyphicon-ok' title='The selected UID'></i></span>";
                                }
                                $card_uid = $row['card_uid'];
                                ?>
                                <form>
                                    <button type="button" class="select_btn" id="<?php echo $card_uid; ?>" title="select this UID"><?php echo $card_uid; ?></button>
                                </form>
                            </th>
                           
                        </tr>
            <?php
                    }
                }
            }
            ?>
        </tbody>
    </table>
    </div>