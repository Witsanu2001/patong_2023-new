
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
    
    .input-innnn{
        margin-left: 150px;
    }

    .input-form{
        margin-left: -180px;
        margin-top: 40px;
    }

    @media (max-width: 768px) {
        .form-control {
            margin-left: -.25px;
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

        .input-innnn{
            margin-left: -45px;
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

<header class="blog-header py-3 slow-fade-in">
        <div class="row flex-nowrap justify-content-between align-items-center">
            <div class="col-4 pt-1">
                <div class="logo slow-fade-in">
                    <img class="img-fluid" src="../images/logo-ha.png"/>
                </div>
            </div>
            <div class="col-4 d-flex justify-content-end align-items-center">
                <div class="input-group mb-3" >
                    <form action="search-selech.php" method="post">
                        <div class="input-group mb-3 input-innnn" >
                            <input type="text" name="name" class="form-control input-form" id="searchInputMobile" placeholder="ค้นหากิจกรรมและข้อมูล" style="">
                            <ul id="searchResults" class="search-results" style="margin-top: 80px; width: 360px; margin-left: -180px;" ></ul>
                            <button type="submit" class="input-group-text" style="background: none; border: none; padding: 0; cursor: pointer; margin-top: 40px;">
                                <i class="fa-solid fa-magnifying-glass" style="color: #007bff;"></i>
                            </button>
                            &nbsp;
                            <a href="#" onclick="confirmLogout()" style="margin-top: 40px;"><i class="bi bi-box-arrow-right" style="color: red; font-size: 25px;"></i></a>
                        </div>
                    </form>
                    <script>
                        function searchData() {
                            console.log("Search icon clicked");
                        }
                    </script>
                </div>
                 <div id="searchBox" class="collapse" style="display: none;">
            </div>          
        </div>
        </div>
      </div>
    </header>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

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
    
    <script>
    function confirmLogout() {
        Swal.fire({
            title: 'ต้องการออกจากระบบหรือไม่?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'ใช่, ออกจากระบบ!',
            cancelButtonText: 'ยกเลิก'
        }).then((result) => {
            if (result.isConfirmed) {
                // กรณีคลิก "ใช่"
                window.location.href = 'logout.php'; // ลิงค์ไปยังหน้า logout.php
            }
        });
    }
    </script>