<?php

class Html{


    public function getListOfEntries($data): string
    {
        $html .= "<table>";
        $html .= "<thead><tr>";
        $html .= "<th>First Name</th>";
        $html .= "<th>Last Name</th>";
        $html .= "<th>Email</th>";
        $html .= "</tr></thead>";
        $html .= "<tbody>";
        foreach ($data as $k => $v){
            $html .= "<tr>";
            $html .= "<th>" . $v['FirstName'] . "</th>";
            $html .= "<th>" . $v['LastName'] . "</th>";
            $html .= "<th>" . $v['Email'] . "</th>";
            $html .= "<th>";
            $html .= "<a href='index.php?delete_key=". 
            $v['Email'] . "'>delete</a>";
            $html .= "</th>";
            $html .= "</tr>";
        }
        $html .= "</tbody>";
        $html .= "</table>";

        return $html;
    }

    public function getForm(): string
    {   
        $html = '<div>
                <form action="index.php" method="post">
                            <label>FirstName:</label>
                            <input type="text" name="first_name" class="request_input"/><br><br>
                            <label>LastName:</label>
                            <input type="text" name="last_name" class="request_input"/><br><br>
                            <label>Email:</label>
                            <input type="email" name="email" class="request_input"/><br><br>
                            <input type="submit" value="Submit" class="request_submit"/>
                </form>  
                </div>';

                return $html;
    }

}