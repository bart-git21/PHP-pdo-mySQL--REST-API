<button id="usersBtn">get users</button>

<input type="text" id="userInput">
<button id="userBtn">get user #1</button>

<form id="updateForm" action="" method="">
    <h2>Update the user:</h2>
    <input type="number" name="id" id="userFormId">
    <textarea name="list" id="userFormLogin" required></textarea>
    <button>Update</button>
</form>

<div class="output" id="output"></div>

<script>
    $(document).ready(function () {
        $("#usersBtn").on("click", function () {
            $.ajax({
                url: "/api/user/",
                method: "GET",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
            })
                .done((response) => {
                    console.log(response)
                })
                .fail((xhr, status, error) => { console.log(xhr.status) })
                .always(() => { });
        });
        $("#userBtn").on("click", function () {
            const id = $("#userBtn").val();
            $.ajax({
                url: `/api/user/index.php/${id}`,
                method: "GET",
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
            }).done().fail((xhr, status, error) => {
                console.log(error);
                $("#output").html(`<p>Error: ${error}</p>`)
            }).finally()
        });
        $("#updateForm").on("submit", function (event) {
            event.preventDefault();
            const data = {
                id: $("#userFormId").val(),
                login: $("#userFormLogin").val(),
            }
            $.ajax({
                url: `/api/user/index.php/${data.id}`,
                method: "PUT",
                headers: { "Content-Type": "application/json" },
                data: JSON.stringify(data),
            })
                .done(response => console.log(response))
                .fail((xhr, status, error) => {
                    console.log(error);
                    $("#output").html(`<p>Error: ${error}</p>`)
                });
        })
    });
</script>