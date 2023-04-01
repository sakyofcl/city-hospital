        <!-- top nav -->
        <nav class="w-100 d-flex px-4 py-2 p-3 mt-5 border-bottom">
            <div class="d-flex ml-auto align-items-center">
                <button class="btn py-0 d-flex align-items-center text-dark font-weight-bold">
                    <?php echo $_SESSION['user']['userName'];?>
                </button>
                <a href="logout.php" class="btn py-0 d-flex align-items-center text-danger text-uppercase font-weight-bold">
                    Logout
                </a>
            </div>
        </nav>
        <!-- end top nav -->