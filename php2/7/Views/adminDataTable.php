<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <style>


        *, *:before, *:after {
            box-sizing: border-box;
        }

        body {
            padding: $ base-spacing-unit;
            font-family: 'Source Sans Pro', sans-serif;
            margin: 0;
        }

        h1, h2, h3, h4, h5, h6 {
            margin: 0;
        }

        .container {
            max-width: 1000px;
            margin-right: auto;
            margin-left: auto;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .table {
            width: 100%;
            border: 1px solid $ color-form-highlight;
        }

        .table-header {
            display: flex;
            width: 100%;
            background: #000;
            padding:($ half-spacing-unit *1.5) 0;
        }

        .table-row {
            display: flex;
            width: 100%;
            padding:($ half-spacing-unit *1.5) 0;

        &
        :nth-of-type(odd) {
            background: $ color-form-highlight;
        }

        }

        .table-data, .header__item {
            flex: 1 1 20%;
            text-align: center;
        }

        .header__item {
            text-transform: uppercase;
        }

        .filter__link {
            color: white;
            text-decoration: none;
            position: relative;
            display: inline-block;
        }

    </style>
</head>
<body>
<a href="/admin/">
    Админ-панель
</a>
</div>
</div>
<div class="container">
    <div class="table">
        <table style="border: black 3px"><?php foreach ($this->table as $row => $data): ?>
                <div class="table-header">
                    <div class="header__item"><a id="<?= $row ?>" class="filter__link" href="#"><?= $row ?></a></div>
                </div>
                <?php foreach ($data as $column): ?>
                    <div class="table-row">
                        <div class="table-data"><?= $column ?></div>
                    </div>
                <?php endforeach; ?>
            <?php endforeach; ?>
        </table>
    </div>
</div>


</body>
</html>