$(document).ready(function() {

    $('button.add_skill').click(function() {

        var fields = '<div>' +
                '   <input type="text" name="comp_skills[]" />' +
                '   <select name="level[]">' +
                '       <option value="Beginner">Beginner</option>' +
                '       <option value="Programmer">Programmer</option>' +
                '       <option value="Ninja">Ninja</option>' +
                '   </select>' +
                '   <br/>' +
                '</div>';

        $('.comp_skills').append(fields);

    });

    $('button.remove_skill').click(function() {

        var lastField = $('.comp_skills div').last();

        if (!lastField.hasClass('first')) {
            lastField.remove();
        }
    });

    $('button.add_lang').click(function() {

        var fields = '<div>' +
                '    <input type="text" name="languages[]" />' +
                '    <select name="comprehension[]">' +
                '        <option>-Comprehension-</option>' +
                '        <option value="beginner">Beginner</option>' +
                '        <option value="intermediate">Intermediate</option>' +
                '        <option value="advanced">Advanced</option>' +
                '    </select>' +
                '    <select name="reading[]">' +
                '        <option>-Reading-</option>' +
                '        <option value="beginner">Beginner</option>' +
                '        <option value="intermediate">Intermediate</option>' +
                '        <option value="advanced">Advanced</option>' +
                '    </select>' +
                '    <select name="writing[]">' +
                '        <option>-Writing-</option>' +
                '        <option value="beginner">Beginner</option>' +
                '        <option value="intermediate">Intermediate</option>' +
                '        <option value="advanced">Advanced</option>' +
                '    </select>' +
                '    <br/>' +
                '</div>';

        $('.languages').append(fields);

    });

    $('button.remove_lang').click(function() {
        var lastField = $('.languages div').last();
        
        if(!lastField.hasClass('first')) {
            lastField.remove();
        }
    });

});