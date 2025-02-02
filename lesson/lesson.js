function showLesson() {
    const box2 = document.getElementById("lesson-display");
    box2.innerHTML = `
        <div class="video-container">
            <iframe 
                width="100%" 
                height="315" 
                src="https://www.youtube.com/embed/VIDEO_ID" 
                frameborder="0" 
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                allowfullscreen>
            </iframe>
        </div>
        <h3>Lesson: Introduction to Programming</h3>
        <h5><img src="../img/john.png" alt="Profile Icon" style="width: 3%; height: 2%; margin-right: 8px; vertical-align: middle; border-radius: 10px;"><strong>Mr.</strong> John Doe</h5>
        <p>This lesson provides an overview of programming basics, including variables, data types, and control structures.</p>
        <div class="experience-bar">
            <div class="badge">
                <img src="../img/bronze.png" alt="Badge Icon">
            </div>
            <div class="progress-container">
                <div class="progress-bar">
                    <div class="progress"></div>
                    <div class="progress-text" style="position: absolute; left: calc(75% - 20px); top: -18px; font-size: 12px; color: #fff; font-weight: bold;">75%</div>
                </div>
            </div>
        </div>
        <!-- Watch Lesson Button with Play Icon aligned to the right side inside the button -->
        <button class="view-button" style="position: absolute; bottom: 6%; right: 14%; border-left: 1px solid #019AEC; border-right: 1px solid #123775; border-top: 1px solid #123775; border-bottom: 4px solid #123775;" onclick="videolesson.php">
            Watch Lesson
            <img src="../img/btnplay.png" alt="Play Icon" class="box2-play-icon">
        </button>
    `;
}