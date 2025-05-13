<!DOCTYPE html>
<html>
<head>
    <title>Fitness Dashboard</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <h1>{{ $user->name }}'s Fitness Dashboard</h1>
    <p>Total Workouts: <strong>{{ $totalWorkouts }}</strong></p>
    <p>Average Workout Duration: <strong>{{ $averageDuration }} minutes</strong></p>

    <h2>Exercise Frequency</h2>
    <canvas id="exerciseChart" width="400" height="200"></canvas>

    <h2>Nutrition Overview</h2>
    <canvas id="nutritionChart" width="400" height="200"></canvas>

    <script>
        const exerciseCtx = document.getElementById('exerciseChart').getContext('2d');
        new Chart(exerciseCtx, {
            type: 'bar',
            data: {
                labels: {!! json_encode($exerciseCounts->keys()) !!},
                datasets: [{
                    label: 'Times Performed',
                    data: {!! json_encode($exerciseCounts->values()) !!},
                    backgroundColor: 'rgba(54, 162, 235, 0.7)',
                }]
            }
        });

        const nutritionCtx = document.getElementById('nutritionChart').getContext('2d');
        const dates = {!! json_encode($nutritionData->pluck('date')) !!};
        new Chart(nutritionCtx, {
            type: 'line',
            data: {
                labels: dates,
                datasets: [
                    {
                        label: 'Calories',
                        data: {!! json_encode($nutritionData->pluck('calories')) !!},
                        borderColor: 'red',
                        fill: false
                    },
                    {
                        label: 'Protein',
                        data: {!! json_encode($nutritionData->pluck('protein')) !!},
                        borderColor: 'green',
                        fill: false
                    },
                    {
                        label: 'Carbs',
                        data: {!! json_encode($nutritionData->pluck('carbs')) !!},
                        borderColor: 'blue',
                        fill: false
                    },
                    {
                        label: 'Fats',
                        data: {!! json_encode($nutritionData->pluck('fats')) !!},
                        borderColor: 'orange',
                        fill: false
                    }
                ]
            }
        });
    </script>
</body>
</html>
