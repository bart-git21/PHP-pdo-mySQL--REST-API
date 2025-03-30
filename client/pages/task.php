<button id="tasksBtn">get tasks</button>

<input type="text" id="taskInput">
<button id="taskBtn">get task #1</button>

<form action="/api/server/" method="POST">
    <h2>Update the task:</h2>
    <input type="number" name="id" id="engIdInput">
    <textarea name="list" id="engTextarea" required></textarea>
    <button>Post</button>
</form>

<div class="output" id="output"></div>

<script>
    $(document).ready(function () {
        $("#tasksBtn").on("click", function () {
            $.ajax({
                url: "/api/task/",
                method: "GET",
                data: { action: "gettasks" },
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
        $("#taskBtn").on("click", function () {
            const id = $("#taskBtn").val();
            $.ajax({
                url: `/api/task/index.php/${id}`,
                method: "GET",
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
            }).done().fail((xhr, status, error) => {
                console.log(error);
                $("#output").html(`<p>Error: ${error}</p>`)
            }).finally()
        })
    });
</script>