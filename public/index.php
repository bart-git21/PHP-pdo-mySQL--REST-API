<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>English</title>

    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

    <!-- css -->
    <link rel="stylesheet" href="./styles/style.css" />
    <!-- script -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="./js/index.js"></script>
</head>

<body>
    <div class="container">
        <h1 class="text-center">Learning the english</h1>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-9">
                <!-- tabs -->
                <ul class="nav nav-tabs d-flex" id="myTab" role="tablist">
                    <li class="nav-item flex-fill" role="presentation">
                        <button class="nav-link active w-100" id="translate-tab" data-bs-toggle="tab"
                            data-bs-target="#translate-tab-pane" type="button" role="tab"
                            aria-controls="translate-tab-pane" aria-selected="true">
                            Translate
                        </button>
                    </li>
                    <li class="nav-item flex-fill" role="presentation">
                        <button class="nav-link w-100" id="dragdrop-tab" data-bs-toggle="tab"
                            data-bs-target="#dragdrop-tab-pane" type="button" role="tab"
                            aria-controls="dragdrop-tab-pane" aria-selected="false">
                            Drag'Drop
                        </button>
                    </li>
                    <li class="nav-item flex-fill" role="presentation">
                        <button class="nav-link w-100" id="writing-tab" data-bs-toggle="tab"
                            data-bs-target="#writing-tab-pane" type="button" role="tab" aria-controls="writing-tab-pane"
                            aria-selected="false">
                            Writing
                        </button>
                    </li>
                </ul>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3 d-flex flex-column">
                <!-- textarea -->
                <?php include "pages/textarea.php"; ?>
            </div>
            <div class="col-md-9">
                <div class="tab-content" id="myTabContent">
                    <!-- game tabs -->
                    <div class="tab-pane fade show active h-100" id="translate-tab-pane" role="tabpanel"
                        aria-labelledby="translate-tab" tabindex="0">
                        <?php include "pages/translate.php"; ?>
                    </div>
                    <div class="tab-pane fade h-100" id="dragdrop-tab-pane" role="tabpanel" aria-labelledby="dragdrop-tab"
                        tabindex="0">
                        <?php include "pages/dragdrop.php"; ?>
                    </div>
                    <div class="tab-pane fade h-100" id="writing-tab-pane" role="tabpanel" aria-labelledby="writing-tab"
                        tabindex="0">
                        <?php include "pages/writing.php"; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>