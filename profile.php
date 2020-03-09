<?php 
    session_start();
    require_once 'koneksi.php';

    $post = mysqli_query($conn, "SELECT * FROM photo");
    $hasil = mysqli_query($conn,"SELECT count(url) FROM photo");
    $postCount = mysqli_fetch_row($hasil);
    $user = $_SESSION['username'];
    $hasil = mysqli_query($conn, "SELECT * FROM profil WHERE username = '$user'");
    $profile = mysqli_fetch_assoc($hasil);

    $name = $profile['nama'];
    $web = $profile['website'];
    $bio = $profile['bio'];
    $email = $profile['email'];
    $phone = $profile['phone_number'];
    $gender = $profile['gender'];

?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile | Vietgram</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <nav class="navigation">
        <div class="navigation__column">
            <a href="feed.php">
                <img src="images/logo.png" />
            </a>
        </div>
        <form method="get" action="feed.php">
            <div class="navigation__column">
            <i class="fa fa-search"></i>
            <input type="text" name="cari" placeholder="Search">
        </div>
        </form>
        <div class="navigation__column">
            <ul class="navigations__links">
                <li class="navigation__list-item">
                    <a href="explore.php" class="navigation__link">
                        <i class="fa fa-compass fa-lg"></i>
                    </a>
                </li>
                <li class="navigation__list-item">
                    <a href="#" class="navigation__link">
                        <i class="fa fa-heart-o fa-lg"></i>
                    </a>
                </li>
                <li class="navigation__list-item">
                    <a href="profile.php" class="navigation__link">
                        <i class="fa fa-user-o fa-lg"></i>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
    <main id="profile">
        <header class="profile__header">
            <div class="profile__column">
                <img src="images/foto_user/shibakabul/1.jpg" width="150" height="150" />
            </div>
            <div class="profile__column">
                <div class="profile__title">
                    <h3 class="profile__username"><?= $user; ?></h3>
                    <a href="edit-profile.php">Edit profile</a>
                    <a href="logout.php">Log Out</a>
                </div>
                <ul class="profile__stats">
                    <li class="profile__stat">
                        <span class="stat__number"><?= $postCount[0] ?></span> posts
                    </li>
                    <li class="profile__stat">
                        <span class="stat__number">1234</span> followers
                    </li>
                    <li class="profile__stat">
                        <span class="stat__number">36</span> following
                    </li>
                </ul>
                <p class="profile__bio">
                    <span class="profile__full-name">
                        <?= $name ?>
                    </span> <?= $bio ?>
                    <a href="<?= $web ?>"><?= $web ?></a>
                </p>
            </div>
        </header>
        <section class="profile__photos">
            <?php foreach ($post as $foto) :?>
            <div class="profile__photo">
                <img src="images/foto_user/shibakabul/1.jpg" width="300" height="270"/>
                <div class="profile__photo-overlay">
                    <span class="overlay__item">
                        <i class="fa fa-heart"></i>
                        <?= $foto['likes']?>
                    </span>
                </div>
            </div>
        <?php endforeach; ?>
        </section>
    </main>
    <footer class="footer">
        <div class="footer__column">
            <nav class="footer__nav">
                <ul class="footer__list">
                    <li class="footer__list-item"><a href="#" class="footer__link">About Us</a></li>
                    <li class="footer__list-item"><a href="#" class="footer__link">Support</a></li>
                    <li class="footer__list-item"><a href="#" class="footer__link">Blog</a></li>
                    <li class="footer__list-item"><a href="#" class="footer__link">Press</a></li>
                    <li class="footer__list-item"><a href="#" class="footer__link">Api</a></li>
                    <li class="footer__list-item"><a href="#" class="footer__link">Jobs</a></li>
                    <li class="footer__list-item"><a href="#" class="footer__link">Privacy</a></li>
                    <li class="footer__list-item"><a href="#" class="footer__link">Terms</a></li>
                    <li class="footer__list-item"><a href="#" class="footer__link">Directory</a></li>
                    <li class="footer__list-item"><a href="#" class="footer__link">Language</a></li>
                </ul>
            </nav>
        </div>
        <div class="footer__column">
            <span class="footer__copyright">© 2017 Vietgram</span>
        </div>
    </footer>
</body>

</html>