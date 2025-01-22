<div class="form-floating d-flex flex-grow-1">
    <textarea class="form-control h-100" placeholder="Leave a comment here" id="textarea"></textarea>
</div>
<div class="d-flex">
    <h6 class="flex-fill w-100">Get the list:</h6>
    <select class="form-select" aria-label="Default select example" id="getList">
        <option selected>Retrieve the list with the ID</option>
        <?php
        include "../src/config/db.php";
        $stmt = $conn->prepare("SELECT * FROM english");
        $stmt->execute();
        $array = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo count($array);
        foreach ($array as $elem):
            $id= $elem['id'];
            echo "<option value='$id'>$id</option>";
        endforeach;
        ?>
    </select>
</div>
<div class="btn-group" role="group" aria-label="Basic outlined example">
    <button type="button" class="btn btn-outline-primary" id="saveList">
        Save the changes
    </button>
    <button type="button" class="btn btn-outline-primary" id="createList">
        Create the new list
    </button>
</div>