<?php

class Html{


    public function getListOfEntries($data): string
    {
        $html = "<div class='rvt-container rvt-container--senior rvt-container--center'><div class='rvt-grid'>";
        $html .= "<div class='rvt-grid__item'>";
        $html .= "<table>";
        $html .= "<caption class='sr-only'>Contacts</caption>";
        $html .= "<thead><tr>";
        $html .= "<th scope='col'>First Name</th>";
        $html .= "<th scope='col'>Last Name</th>";
        $html .= "<th scope='col'>Email</th>";
        $html .= "</tr></thead>";
        $html .= "<tbody>";

        foreach ($data as $k => $v){
            $html .= "<tr>";
            $html .= "<th>" . $v['FirstName'] . "</th>";
            $html .= "<th>" . $v['LastName'] . "</th>";
            $html .= "<th>" . $v['Email'] . "</th>";
            $html .= "</tr>";
        }
        $html .= "</tbody>";
        $html .= "</table>";
        $html .= "</div>";
        $html .= "</div>";
        $html .= "</div>";

        return $html;
    }

    public function getForm($errors = []): string
    {
        $html = "<div class='rvt-container rvt-container--senior rvt-container--center rvt-m-tb-md'><div class='rvt-grid'>";
        $html .= "<div class='rvt-grid__item'>";
        $html .= "<form action='index.php' method='POST'>";
        $html .= $this->getTextInput('firstname', 'first name');
        $html .= isset($errors['firstname']) ? $this->getErrorMessage($errors['firstname']) : "";
        $html .= $this->getTextInput('lastname', 'last name');
        $html .= isset($errors['lastname']) ? $this->getErrorMessage($errors['lastname']) : "";
        $html .= $this->getTextInput('email', 'email');
        $html .= isset($errors['email']) ? $this->getErrorMessage($errors['email']) : "";
        $html .= $this->getSubmitButton('submit');
        $html .= "</form>";
        $html .= "</div>";
        $html .= "</div>";
        $html .= "</div>";

        return $html;
    }

    private function getTextInput($id, $label): string
    {
        $html = "<label for='$id'>";
        $html .= ucwords($label);
        $html .= "</label>";
        $html .= "<input type='text' id='$id' name='$id' class=''/>";

        return $html;
    }

    private function getErrorMessage($message) {
        $html = <<< ERROR
<div class="rvt-inline-alert rvt-inline-alert--danger">
    <span class="rvt-inline-alert__icon">
        <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
            <g fill="currentColor">
                <path d="M8,0a8,8,0,1,0,8,8A8,8,0,0,0,8,0ZM8,14a6,6,0,1,1,6-6A6,6,0,0,1,8,14Z" />
                <path d="M10.83,5.17a1,1,0,0,0-1.41,0L8,6.59,6.59,5.17A1,1,0,0,0,5.17,6.59L6.59,8,5.17,9.41a1,1,0,1,0,1.41,1.41L8,9.41l1.41,1.41a1,1,0,0,0,1.41-1.41L9.41,8l1.41-1.41A1,1,0,0,0,10.83,5.17Z"/>
            </g>
        </svg>
    </span>
    <span class="rvt-inline-alert__message" id="username-message">
        $message
    </span>
</div>
ERROR;

        return $html;
    }

    private function getSubmitButton($label): string
    {
        return "<button class='rvt-button' type='submit'>" . ucfirst($label) . "</button>";
    }
}