<style>
    .search-container {
        position: relative;
        display: inline-block;
    }

    #searchResults {
        display: none;
        position: absolute;
        list-style: none;
        padding: 0;
        margin: 0;
        border: 1px solid #ccc;
        background-color: #fff;
        z-index: 10000;
        margin-top:60px;
        width: 410px;
        border-radius:10px;
    }

    #searchResults li {
        padding: 8px;
        cursor: pointer;
    }

    #searchResults li:hover {
        background-color: #f1f1f1;
    }

    .form-control{
        margin-top: 40px;

    }
    
    .input-group-in{
        margin-left: 400px;
    }

    @media (max-width: 768px) {
        .form-control {
            margin-left: -70px;
            margin-right: -80px;
            margin-top: 40px;
        }
        .search-results {
            left: -240px;
            top: 20px;
        }
        .fa-magnifying-glass{
            margin-left:80px
        }
        .button{
            margin-left: -15px; 
            margin-top: 10px;
        }

        .input-group-in{
            margin-left: 0px;
        }
        .justify-content-between{
            width: 220px;
        }
        .blog-header{
            margin-top: -25px;
            height: 120px;
        }
    }
</style>


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-cCiXlhKv8VZowb/cayQGw5lvXy66YP2U4DJYRHg9VABZiI1H3+nExCOcMWI6kQVxgwmB1wgDj6Ylu5QQ7vENlLg==" crossorigin="anonymous" />
<header class="blog-header py-3 slow-fade-in" style="margin-top: -15px; ">
    <div class="row flex-nowrap justify-content-between align-items-center">
        <div class="col-4 pt-1">
            <div class="logo slow-fade-in">
                <img class="img-fluid" src="images/logo-main.png" />
            </div>
        </div>

        <div class="col-4 d-flex justify-content-end align-items-center">
            <div class="input-group mb-3" >
                <form action="search-selech.php" method="post">
                    <div class="input-group mb-3 input-group-in">
                        <input type="text" name="name" class="form-control" id="searchInputMobile" placeholder="ค้นหากิจกรรมและข้อมูล" style="width:10px">
                        <ul id="searchResults" class="search-results" style="margin-top: 80px; width: 290px;"></ul>
                        <button type="submit" class="input-group-text" style="background: none; border: none; padding: 0; cursor: pointer; margin-top: 40px;">
                            <i class="fa-solid fa-magnifying-glass" style="color: #007bff;"></i>
                        </button>
                    </div>
                </form>
                <script>
                    function searchData() {
                        console.log("Search icon clicked");
                    }
                </script>

            </div>
            <a class="link-primary" href="#" aria-label="Search" id="searchIcon"></a>
        </div>
            <div class="button">
                <?php include "button-menu.php"; ?>
            </div>
    </div>
</header>

<script>
    $(document).ready(function(){
    // ฟังก์ชันในการค้นหา
    function searchAction(searchText) {
        $.ajax({
            url: 'search.php',
            type: 'post',
            data: {search: searchText},
            success: function(response){
                var resultsDropdown = $("#searchResults");
                resultsDropdown.html(response);
                resultsDropdown.show(); // แสดง dropdown เมื่อมีผลลัพธ์

                // เพิ่มการจัดการเหตุการณ์เมื่อคลิกที่ผลลัพธ์
                resultsDropdown.find('li').on('click', function () {
                    var selectedValue = $(this).text();
                    $("#searchInputMobile").val(selectedValue);
                    resultsDropdown.hide();
                });

            }
        });
    }

        $("#searchInput, #searchInputMobile").on("keyup", function(event){
        var searchText = $(this).val();
        if(event.which === 13){
            // ถ้า key code ของคีย์ที่ถูกกดคือ Enter
            searchAction(searchText);
        } else if(searchText !== ''){
            searchAction(searchText);
        } else {
            $("#searchResults").hide(); // ซ่อน dropdown เมื่อไม่มีการพิมพ์
        }
    });


    $(document).on("click", function(e){
    if (!$(e.target).closest('.search-container').length &&
        !$(e.target).is('#searchInput') &&
        !$(e.target).is('#searchInputMobile')) {
        $("#searchResults").hide();
    }
});


});

</script>
