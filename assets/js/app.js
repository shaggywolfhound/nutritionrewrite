$(document).ready(function() {

    let $itemsref = $('.itemsDisplayed select');
    let $sortBy = $('.sortBy select');
    let $direction = $('.sortDirection select');
    let $pageNumber = $('.pageNumber select');

    let $url = $itemsref.val();

    $itemsref.on('change', function () {
        $url = $itemsref.val();
        // window.location.href = $url;

    });

    // $(".prodIdSelect").attr("href", $url + "&prodSelect=asc");
    // $(".prodIdSelect").attr("href", $url + "&prodSelect=asc");
    //

    // prodIdSelect
    // prodNameSelect
});
