<?php

include "bdd-connexion.php";

//AFFICHER TOUTES LES CARTES//
$sql = "SELECT id, title, description, img_name, time FROM cards";
$resultset = mysqli_query($bdd, $sql) or die("database error:" . mysqli_error($bdd));
while ($record = mysqli_fetch_assoc($resultset)) {
    ?>

    <div class="col-md-4">
        <div class="card mb-4 box-shadow">
            <img class="card-img-top" src="<?php echo $record['img_name'] ?>" alt="Card image cap">
            <div class="card-body">
                <h3 data-editable><?php echo $record['title'] ?></h3>
                <p data-editable class="card-text"><?php echo $record['description'] ?></p>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                        <?php if (isset($_SESSION['role']) && $_SESSION['role'] == '2') {
                                echo "" ?><form method="POST" action="cards-update.php">
                                <input type="hidden" name="id" value="<?php echo $record['id'] ?>">
                                <input type="submit" class="btn btn-sm btn-outline-success" value="Save edit" style="border-radius: 10px 0px 0px 10px!important;border-right: 0.5px solid rgba(190,190,190,0.5);"></input>
                            </form>
                            </form><?php } ?>
                        <?php if (isset($_SESSION['role']) && $_SESSION['role'] == '2') {
                                echo "" ?><form method="POST" action="cards-delete.php">
                                <input type="hidden" name="id" value="<?php echo $record['id'] ?>">
                                <input type="submit" class="btn btn-sm btn-outline-danger" value="Delete" style="border-radius: 0px 10px 10px 0px;border-left: 0.5px solid rgba(190,190,190,0.5);">
                            </form><?php } ?>
                    </div>
                    <small class="text-muted"><?php echo $record['time'] ?></small>
                </div>
            </div>
        </div>
    </div>
<?php }

mysqli_close($bdd);
