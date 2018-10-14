<!doctype html>
<html>
<head>
<title>Admin</title>
<style>
span{
    color:red;
}
</style>
</head>
<body>
    <form action="upload.php" method="POST" enctype="multipart/form-data">
    <table>
        <tr>
        <td>Song Name:<span>*</span></td>
        <td><input type="text" name="songname" placeholder="Song Name" required></td>
        </tr>
        <tr>
        <td>Add Song:<span>*</span></td>
        <td><input type="file" name="audioFile" required></td>
        </tr>
        <tr>
        <td>Language:<span>*</span></td>
        <td>
            <select name='language'>
                <option value="English">English</option>
                <option value="Marathi">Marathi</option>
                <option value="Hindi">Hindi</option>
                <option value="Punjabi">Punjabi</option>
                <option value="Tamil">Tamil</option>
            </select>
        </td>
        </tr>
    </table>
        <input type="submit" value="Upload Song" name="save_audio">
    </form>
</body>
</html>