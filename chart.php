<!DOCTYPE html>
<html lang="en">
    <?php

        $title = 'Welcome';
        require_once('utility/header.php');
        load_css('template');

    ?>
    <body>
        <canvas id="bar-chart-grouped" width="800" height="450"></canvas>
        <?php
            require_once('utility/footer.php');
        ?>
        <script>
            new Chart(document.getElementById("bar-chart-grouped"), {
                type: 'bar',
                data: {
                labels: ["1900", "1950", "1999", "2050"],
                datasets: [
                    {
                    label: "1st Sem",
                    backgroundColor: "#3e95cd",
                    data: [133,221,783,2478]
                    }, {
                    label: "2nd Sem",
                    backgroundColor: "#8e5ea2",
                    data: [408,547,675,734]
                    }
                ]
                },
                options: {
                title: {
                    display: true,
                    text: 'Population growth (millions)'
                }
                }
            });
        </script>
    </body>
</html>