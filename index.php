<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Color Pallete</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="navbar" id="navbarTop" style="display:flex;">

        <button id="add">Add Color</button>
        <button id="save" onclick="save_data()">Save Pallete</button>
        <button id="preview" onclick="location.href='view.php'">Preview Palletes</button>
        <button id="logout" onclick="location.href='logout.php'">Logout</button>

    </div>
    <div class="big_div">
        <div class="container" id="collection">
            <div class="color_box">
                <div class="color_show">
                </div>
                <div class="color_content">
                    <p class="color_name">black</p>
                    <button id="del1" class="del" onclick="del_col(0)">Delete</button>
                    <button id="change1" class="change" onclick="change_col(0)">Change</button>
                </div>

            </div>
            <div class="color_box">
                <div class="color_show">
                </div>
                <div class="color_content">
                    <p class="color_name">black</p>
                    <button id="del2" class="del" onclick="del_col(1)">Delete</button>
                    <button id="change2" class="change" onclick="change_col(1)">Change</button>
                </div>

            </div>

            <div class="color_box">
                <div class="color_show">
                </div>
                <div class="color_content">
                    <p class="color_name">black</p>
                    <button id="del3" class="del" onclick="del_col(2)">Delete</button>
                    <button id="change3" class="change" onclick="change_col(2)">Change</button>
                </div>

            </div>

            <div class="color_box">
                <div class="color_show">
                </div>
                <div class="color_content">
                    <p class="color_name">black</p>
                    <button id="del4" class="del" onclick="del_col(3)">Delete</button>
                    <button id="change4" class="change" onclick="change_col(3)">Change</button>
                </div>

            </div>

            <div class="color_box">
                <div class="color_show">
                </div>
                <div class="color_content">
                    <p class="color_name">black</p>
                    <button id="del5" class="del" onclick="del_col(4)">Delete</button>
                    <button id="change5" class="change" onclick="change_col(4)">Change</button>

                </div>

            </div>

            <div class="color_box">
                <div class="color_show">
                </div>
                <div class="color_content">
                    <p class="color_name">black</p>
                    <button id="del6" class="del" onclick="del_col(5)">Delete</button>
                    <button id="change6" class="change" onclick="change_col(5)">Change</button>
                </div>

            </div>
        </div>
        <div class="triggers">
            <button id='shuffle'>Generate a new pallete</button>
        </div>
    </div>
    <script src="script.js"></script>
</body>

</html>