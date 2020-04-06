<!DOCTYPE html>
    <html lang="en">
        <body>
            <form action="editor.php" method="post" enctype="multipart/form-data">
                Select file to upload:
                <input type="file" name="fileToUpload" id="fileToUpload">
                <label>Choose the Language:
                    <select name = "lang">
                        <option value="Python">Python</option>
                        <option value="Java">Java</option>
                        <option value="Cpp">C++</option>
                        <option value="Php">PHP</option>
                    </select>
                </label>
                <textarea name="input"></textarea>
                <input type="submit" value="Submit Data" name="submit">
            </form>
        </body>
    </html>