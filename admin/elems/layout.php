<!DOCTYPE html>

<html>
    <head>
        <title><?= $title ?></title>
        <link rel='stylesheet' href='style.css' type="text/css">
    </head>
    <body>
      <div id ="wrapper">
          <header>
              <a href = "\admin\elems\logout.php">Выйти</a>
 <?php  ?>
          </header>
          <main>
              <?= $content ?>
              <?= $addPage ?>
          </main>
          <footer>
              <?php include 'elems/footer.php'; ?>
          </footer>
      </div>
    </body>
</html>


