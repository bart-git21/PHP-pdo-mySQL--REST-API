<script>
    let initialList = [];
    let initialAmount = 0;
    let trainingList = [];
    let question = "";
    let answer = "";
    let counter = 0;
    let isPlay = false;
    let timerId = 0;

    // progress bar
    let progress = 0;

    // timer for sentence to show
    let translateDelay = 10;
    let showedPopup = false;
    let isChangingDelay = false;

    const displayResult = (number) => {
        $("#translate_answer").val("");

        switch (true) {
            case number === 0:
                $("#translate_question").val("Keep going!");
                break;
            case number > 0: {
                $("#translate_question").val(`
                Well done!
                You deleted ${number} ${number === 1 ? "card" : "cards"}!
            `);
                break;
            }
            default:
                $("#translate_question").val("Click to start!");
                break;
        }
    };

    const updateDelay = (value = 0) => {
        if (isChangingDelay) return false;
        isChangingDelay = true;
        translateDelay = value;
        setTimeout(() => {
            isChangingDelay = false;
        }, 2000);
        return true;
    };

    const showPopup = () => {
        showedPopup = true;
        setTimeout(() => {
            showedPopup = false;
        }, 2000);
    };

    const updateProgress = () => {
        progress = initialList.length
            ? initialAmount -
            initialList.length -
            trainingList.length
            : 0;
    };

    const addKeyListener = () => {
        $(document).keyup((event) => {
            switch (event.key) {
                case "ArrowUp":
                    updateDelay(translateDelay = + 0.5) && showPopup();
                    break;
                case "ArrowDown":
                    updateDelay(translateDelay = - 0.5) && showPopup();
                    break;
                case "ArrowLeft":
                    prevSentence();
                    break;
                case "ArrowRight":
                    nextSentence();
                    break;
                case "Delete":
                    deleteSentence();
                    break;
                case " ":
                    start();
                    break;
            }
        });
    }

    const removeKeyListener = () => {
        myHtml && (myHtml.onkeyup = null);
    };

    const clear = () => {
        initialList = trainingList = [];
        question = "The sentences are changed. Click to start!";
        answer = "";
    };

    const start = () => {
        try {
            stop();
            const store = useListStore();
            initialList = store.getShallowCopy();
            if (!initialList.length) {
                question = "The list is empty!";
                return;
            }
            trainingList = [];
            initialAmount = initialList.length;
            addKeyListener();
            btnContinue?.focus();
            addSentence();
            play();
        } catch (err) {
            if (err instanceof Error) console.error(err.message);
        }
    };

    const deleteSentence = () => {
        if (!isPlay || !trainingList.length) return;
        stop();
        trainingList.splice(counter, 1);
        updateProgress();
        play();
    };

    const addSentence = () => {
        try {
            counter = 0;
            if (initialList.length && trainingList.length < 11) {
                trainingList.push(initialList.pop());
            }
            trainingList.length > 1 && shuffle(trainingList);
        } catch (err) {
            if (err instanceof Error) console.error(err.message);
        }
    };

    const prevSentence = () => {
        if (!isPlay || !trainingList.length) return;
        stop();
        counter > 0 && (counter -= 1);
        play();
    };

    const nextSentence = () => {
        stop();
        addKeyListener();
        counter < trainingList.length ? counter++ : addSentence();
        play();
    };

    const play = async () => {
        try {
            if (!initialList.length && !trainingList.length) {
                displayResult(-1);
                return;
            }
            isPlay = true;
            while (counter < trainingList.length) {
                setQuestionAndAnswer(
                    trainingList[counter][1],
                    trainingList[counter][0]
                );
                await new Promise((resolve) => {
                    timerId = setTimeout(() => {
                        counter += 1;
                        resolve();
                    }, translateDelay * 1000);
                });
            }
            displayResult(progress);
            isPlay = false;
        } catch (err) {
            if (err instanceof Error) console.log(err.message);
        }
    };

    const stop = () => {
        clearTimeout(timerId);
        isPlay = false;
        question = "The game is stopped. Click to continue";
        answer = "";
    };

    $(document).ready(function () {
        addKeyListener();

        $("#translate_start").on("click", function () {
            console.log($("#textarea").val());
        })
    })
</script>

<div class="card text-center h-100">
    <div class="card-header d-flex justify-content-between">
        <div class="btn-group d-inline-block" role="group" aria-label="Basic example">
            <button type="button" class="btn btn-success" id="translate_start">Start (spacebar)</button>
            <button type="button" class="btn btn-primary" id="translate_continue">Continue (right arrow)</button>
            <button type="button" class="btn btn-danger" id="translate_stop">Stop</button>
        </div>
        <input title="timer" type="email" class="form-control d-inline-block p-0 w-auto" id="translate_delay"
            placeholder="delay" value="10">
    </div>
    <div class="card-body d-flex flex-column">
        <h3 class="card-title flex-fill" id="translate_question">Special title treatment</h3>
        <div class="card-text" id="translate_answer"></div>
        <div class="progress mt-3" role="progressbar" aria-label="Example 30px high" aria-valuenow="0" aria-valuemin="0"
            aria-valuemax="100" style="height: 30px">
            <div id="translate_progress_bar" class="progress-bar" style="width: 0%"></div>
        </div>
    </div>
    <div class="card-footer text-body-secondary">
        <div class="">
            <h4>Keyboard buttons control:</h4>
            <div>
                [del] - delete the sentence
            </div>
            <div>
                <i class="fa-solid fa-square-caret-left"></i> - return
                last card
            </div>
            <div>
                <i class="fa-solid fa-square-caret-right"></i> - call next
                card
            </div>
            <div>
                <i class="fa-solid fa-square-caret-up"></i><i class="fa-solid fa-square-caret-down"></i> - To
                increase or decrease the delay time by 0.5 second
            </div>
            <div>[Spacebar] - start from begining</div>
        </div>
    </div>
</div>