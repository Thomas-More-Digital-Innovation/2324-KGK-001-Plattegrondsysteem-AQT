<!DOCTYPE html>
<html>
<head>
<style>
        /* Styling for the left navigation bar */
        div {
            width: 120px;
            background-color: #016064;
        }

        .nav {
            color: #fff;
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding-top: 20px;
        }

        .nav ul {
            list-style: none;
            padding: 0;
        }

        .nav li {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .nav a {
            text-decoration: none;
            color: #fff;
            margin-top: 5px; /* Adjust the spacing between icon and text */
        }

        /* Styling for the right navigation bar */
        .nav2 {
            background-color: #333;
            color: #fff;
            position: fixed;
            top: 0;
            bottom: 0;
            right: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding-top: 20px;
        }

        .nav2 ul {
            list-style: none;
            padding: 0;
        }

        .nav2 li {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .nav2 a {
            text-decoration: none;
            color: #fff;
            margin-top: 5px; /* Adjust the spacing between icon and text */
        }
    </style>
</head>
<body>
    <div class="nav">
        <ul>
            <li>
                <iconify-icon icon="ion:home" height="50"></iconify-icon>
                <a href="#">Home</a>
            </li>
            <li>
                <iconify-icon icon="clarity:clipboard-line" height="50"></iconify-icon>
                <a href="#">Inventaris</a>
            </li>
            <li>
                <iconify-icon icon="mingcute:paper-line" height="50"></iconify-icon>
                <a href="#">Protocollen</a>
            </li>
            <li>
                <iconify-icon icon="solar:medical-kit-outline" height="50"></iconify-icon>
                <a href="#">Voederrichtlijnen</a>
            </li>
        </ul>
    </div>
    <div class="nav2">
        <ul>
            <li>
                <iconify-icon icon="mdi:account-box" height="50"></iconify-icon>
                <a href="#">Account</a>
            </li>
            <li>
                <iconify-icon icon="tabler:logout" height="50"></iconify-icon>
                <a href="#">Afmelden</a>
            </li>
            <li>
                <iconify-icon icon="material-symbols:admin-panel-settings-outline-rounded" height="50"></iconify-icon>
                <a href="#">Admin</a>
            </li>
        </ul>
    </div>
</body>
</html>

    <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
</body>
</html>

