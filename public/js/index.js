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
      .always(() => {});
  });
  $("#saveList").on("click", function () {});
  $("#createList").on("click", function () {
    const list = $("#textarea").val();
    $.ajax({
      url: "./../src/api/server.php?action=addList",
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
  $("#deleteList").on("click", function () {});
});
