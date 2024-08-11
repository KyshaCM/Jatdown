<?php 
$title = "Make notes/Adddiary";
include ("header.php");?>

        <div>
            <form id="diaryForm" action="diary.php" method="post">
               
                <label for="date">Date:</label>
                <input type="date" id="date" name="date" required>
            
                <label for="title">Title:</label>
                <input type="text" id="title" name="title" required>
            
                <label for="entry">Diary:</label>
                <textarea id="entry" name="entry" rows="8" required></textarea>
            
                <button type="submit">Save</button>
            </form>
        </div>
    </div>
    
<?php include ("footer.php");?>
