<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div id="activity-list" class="grid grid-cols-4 items-center justify-center gap-x-10"></div>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        const apiEndpoint = 'http://localhost/project-final/index.php/ActivityController/';
        
        fetch(apiEndpoint)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json(); // Parse JSON from the response
            })
            .then(data => {
                console.log(data); // Output the data to check the structure
                displayActivities(data.query); // Pass the data to a function to display
            })
            .catch(error => {
                console.error('Fetch error:', error);
            });

        function displayActivities(activities) {
            const container = document.getElementById('activity-list');
            activities.forEach(activity => {
                const activityCard = document.createElement('div');
                activityCard.className = 'w-[200px] h-[200px] mb-6 bg-red-300';

                activityCard.innerHTML = `
                    <div class="mb-4">
                        <div class="w-[200px] h-[110px] rounded-lg overflow-hidden">
                            <img src="<?= base_url('assets/image/logo.png'); ?>" alt="Activity Logo">
                        </div>
                        <h1 class="text-[20px] text-[#505050]">${activity.name}</h1>
                    </div>
                    <div class="text-[#808080]">
                        <h3 class="text-[16px]">${activity.major || 'วิศวกรรมซอฟต์แวร์'}</h3>
                        <div class="flex items-center justify-between text-[12px]">
                            <p><i class="fa-regular fa-calendar-check"></i> ${new Date(activity.date_time).toLocaleDateString()}</p>
                            <p><i class="fa-solid fa-users"></i> ${activity.count || 0}/25</p>
                            <p><i class="fa-regular fa-clock"></i> ${activity.duration || 45} นาที</p>
                        </div>
                    </div>
                `;

                container.appendChild(activityCard);
            });
        }
    </script>
</body>
