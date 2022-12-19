<div class="tru_students_box">
    <p class="meta-options tru_students_field">
        <label for="tru_students_name">Name</label>
        <input id="tru_students_name"
            type="text"
            name="tru_students_name"
            value="<?php echo esc_attr( get_post_meta( get_the_ID(), 'tru_students_name', true ) ); ?>">
    </p>
    <p class="meta-options tru_students_field">
        <label for="tru_students_roll_no">Roll_no</label>
        <input id="tru_students_roll_no"
            type="number"
            name="tru_students_roll_no"
            value="<?php echo esc_attr( get_post_meta( get_the_ID(), 'tru_students_roll_no', true ) ); ?>">
    </p>
    <p class="meta-options tru_students_field">
        <label for="tru_students_dob">DOB</label>
        <input id="tru_students_dob"
            type="date"
            name="tru_students_dob"
           value="<?php echo esc_attr( get_post_meta( get_the_ID(), 'tru_students_dob', true ) ); ?>">
    </p>
</div>
