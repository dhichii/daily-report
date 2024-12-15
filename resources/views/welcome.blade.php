<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Indeks Kepuasan Masyarakat</title>
</head>

<body>
    <div class="jumbotron jumbotron-fluid bg-info text-white">
        <div class="container text-center">
            <h1 class="display-4">INDEKS KEPUASAN MASYARAKAT</h1>
            <p class="lead">
            <h2>
                INDEKS KEPUASAN MASYARAKAT <br> Terhadap Pelayanan Polres Minahasa
                <h2>
        </div>
    </div>

    <style>
    .box {
        padding: 30px 40px;
        border-radius: 5px;
    }

    :root {
        --card-line-height: 1.2em;
        --card-padding: 1em;
        --card-radius: 0.5em;
        --color-green: #558309;
        --color-gray: #e2ebf6;
        --color-dark-gray: #c4d1e1;
        --radio-border-width: 2px;
        --radio-size: 1.5em;
    }

    body {
        background-color: #f2f8ff;
        color: #263238;
        font-family: 'Noto Sans', sans-serif;
        margin: 0;
        padding: 2em 6vw;
    }

    .grid {
        display: grid;
        grid-gap: var(--card-padding);
        margin: 0 auto;
        max-width: 60em;
        padding: 0;

        @media (min-width: 42em) {
            grid-template-columns: repeat(3, 1fr);
        }
    }

    .card {
        background-color: #fff;
        border-radius: var(--card-radius);
        position: relative;

        &:hover {
            box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.15);
        }
    }

    .radio {
        font-size: inherit;
        margin: 0;
        position: absolute;
        right: calc(var(--card-padding) + var(--radio-border-width));
        top: calc(var(--card-padding) + var(--radio-border-width));
    }

    @supports(-webkit-appearance: none) or (-moz-appearance: none) {
        .radio {
            -webkit-appearance: none;
            -moz-appearance: none;
            background: #fff;
            border: var(--radio-border-width) solid var(--color-gray);
            border-radius: 50%;
            cursor: pointer;
            height: var(--radio-size);
            outline: none;
            transition:
                background 0.2s ease-out,
                border-color 0.2s ease-out;
            width: var(--radio-size);

            &::after {
                border: var(--radio-border-width) solid #fff;
                border-top: 0;
                border-left: 0;
                content: '';
                display: block;
                height: 0.75rem;
                left: 25%;
                position: absolute;
                top: 50%;
                transform:
                    rotate(45deg) translate(-50%, -50%);
                width: 0.375rem;
            }

            &:checked {
                background: var(--color-green);
                border-color: var(--color-green);
            }
        }

        .card:hover .radio {
            border-color: var(--color-dark-gray);

            &:checked {
                border-color: var(--color-green);
            }
        }
    }

    .plan-details {
        border: var(--radio-border-width) solid var(--color-gray);
        border-radius: var(--card-radius);
        cursor: pointer;
        display: flex;
        flex-direction: row;
        padding: var(--card-padding);
        transition: border-color 0.2s ease-out;
    }

    .card:hover .plan-details {
        border-color: var(--color-dark-gray);
    }

    .radio:checked~.plan-details {
        border-color: var(--color-green);
    }

    .radio:checked~#plan-details-1 {
        background-color: #6690FF;
        color: white;
    }

    .radio:checked~#plan-details-2 {
        background-color: #FDC772;
        color: white;
    }

    .radio:checked~#plan-details-3 {
        background-color: #FF7D71;
        color: white;
    }

    .radio:focus~.plan-details {
        box-shadow: 0 0 0 2px var(--color-dark-gray);
    }

    .radio:disabled~.plan-details {
        color: var(--color-dark-gray);
        cursor: default;
    }

    .radio:disabled~.plan-details .plan-type {
        color: var(--color-dark-gray);
    }

    .card:hover .radio:disabled~.plan-details {
        border-color: var(--color-gray);
        box-shadow: none;
    }

    .card:hover .radio:disabled {
        border-color: var(--color-gray);
    }

    .plan-type {
        color: var(--color-green);
        font-size: 1.5rem;
        font-weight: bold;
        line-height: 1em;
    }

    .plan-cost {
        font-size: 2.5rem;
        font-weight: bold;
        padding: 0.5rem 0;
    }

    .slash {
        font-weight: normal;
    }

    .plan-cycle {
        font-size: 2rem;
        font-variant: none;
        border-bottom: none;
        cursor: inherit;
        text-decoration: none;
    }

    .hidden-visually {
        border: 0;
        clip: rect(0, 0, 0, 0);
        height: 1px;
        margin: -1px;
        overflow: hidden;
        padding: 0;
        position: absolute;
        white-space: nowrap;
        width: 1px;
    }
    </style>

    <div class="container">
        <div class="alert alert-danger" role="alert">
            Perhatian!! untuk memberiikan penilaian/poling/suara silahkan klik icon/Emoji
        </div>

        <form method="POST" action="{{ route('submit.result') }}">
            @csrf
            <div class="grid">
                <label class="card">
                    <input class="radio " type="radio" name="result" value="PUAS" id="puas">

                    <span id="plan-details-1" class="plan-details">
                        <div class="col-md-6">
                            <h5>Puas</h5>
                            <h2>5</h2>
                            <h5>Suara</h5>
                        </div>
                        <div class="col-md-6">
                            <a href="#" title="Jika anda merasa puas dengan Pelayanan kami, klik icon ini">
                                <img src="/img/puas.png" style="width: 100px">
                            </a>
                        </div>
                    </span>
                </label>
                <label class="card">
                    <input class="radio" type="radio" name="result" value="CUKUP" id="cukup">

                    <span id="plan-details-2" class="plan-details">
                        <div class="col-md-6">
                            <h5>Cukup</h5>
                            <h2>5</h2>
                            <h5>Suara</h5>
                        </div>
                        <div class="col-md-6">
                            <a href="#" title="Jika anda merasa puas dengan Pelayanan kami, klik icon ini">
                                <img src="/img/cukup.png" style="width: 100px">
                            </a>
                        </div>
                    </span>
                </label>
                <label class="card">
                    <input class="radio" type="radio" name="result" value="KURANG" id="kurang">

                    <span id="plan-details-3" class="plan-details">
                        <div class="col-md-6">
                            <h5>Kurang</h5>
                            <h2>5</h2>
                            <h5>Suara</h5>
                        </div>
                        <div class="col-md-6">
                            <a href="#" title="Jika anda merasa puas dengan Pelayanan kami, klik icon ini">
                                <img src="/img/kurang.png" style="width: 100px">
                            </a>
                        </div>
                    </span>
                </label>
            </div>

            <div class="w-100 text-center">
                <button class="mt-3 w-25" type="submit">Vote</button>
            </div>
    </div>
    </form>



    <!-- Akhir Container -->


    <footer class="bg-secondary text-center text-white mt-3 bt-2 pb-2">
        Kepolisian Resor Minahasa



</body>

</html>