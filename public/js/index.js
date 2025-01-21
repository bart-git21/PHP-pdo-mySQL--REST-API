$(document).ready(function () {
  $("#getList").on("change", function () {
    const id = $(this).val();
    $.ajax({
      url: "../src/api/server.php?action=getList",
      method: "GET",
      headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
      },
      data: { id },
    })
      .done((response) => {
        $("#textarea").val(response.list);
      })
      .fail(() => {})
      .always(() => {});
  });
  $("#createList").on("click", function () {
    const list = $("#textarea").val();
    $.ajax({
      url: "../src/api/server.php?action=addList",
      method: "POST",
      contentType: "application/json",
      headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
      },
      data: JSON.stringify({ list }),
    })
      .done((response) => {
        console.log(response);
      })
      .fail(() => {})
      .always(() => {});
  });
  $("#saveList").on("click", function () {});
  $("#deleteList").on("click", function () {});
});
