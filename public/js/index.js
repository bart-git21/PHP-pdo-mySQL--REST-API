$(document).ready(function () {
  $("#getList").on("change", function () {
    const id = $(this).val();
    $.ajax({
      url: "./api/server.php?action=getList",
      method: "GET",
      contentType: "application/json",
      headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
      },
      data: JSON.stringify({ id }),
    })
      .done((response) => {
        console.log(response.list);
        $("#textarea").val(response.list);
      })
      .fail(() => {})
      .finally(() => {});
  });
  $("#saveList").on("click", function () {});
  $("#createList").on("click", function () {});
  $("#deleteList").on("click", function () {});
});
