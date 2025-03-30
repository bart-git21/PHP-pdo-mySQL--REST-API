<button id="getEnglishBtn" type="button" class="btn btn-outline-primary">get english /</button>

<form class="row g-3">
    <div class="col-auto">
        <label for="getEngId" class="visually-hidden">english id:</label>
        <input type="number" min="1" max="8" class="form-control" id="getEngId" placeholder="1">
    </div>
    <div class="col-auto">
        <button id="getEngIdBtn" type="submit" class="btn btn-outline-primary">get english /:id</button>
    </div>
</form>

<script>
    $("#getEnglishBtn").on("click", function () {
        $.ajax({
            url: "/api/english/",
            method: "GET",
        }).done(response => {
            console.log(response);
        }).fail((xhr, status, error) => { console.log(xhr.status) }).always()
    });
    $("#getEngIdBtn").on("click", function (event) {
        event.preventDefault();
        const id = $("#getEngId").val();
        $.ajax({
            url: `/api/english/index.php/${id}`,
            method: "GET",
        }).done(response => {
            console.log(response);
        }).fail((xhr, status, error) => {
            console.log(xhr.status);
        }).always()
    });
</script>