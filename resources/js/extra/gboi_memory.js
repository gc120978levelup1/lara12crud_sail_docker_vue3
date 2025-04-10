import { watch } from 'vue';
var mem = {
    // save objects to localStorage, save to localStorage as JSON string
    save: (object_id_string, object_to_save) => {
        localStorage.setItem(object_id_string,JSON.stringify(object_to_save));
    },
    // get the current value of the object inside the localStorage, 
    get: (object_id_string, saved_obj) => {
        let object_to_save = JSON.parse(localStorage.getItem(object_id_string));
        if (object_to_save){
            saved_obj.value = object_to_save;
        }
    },
    // bind the object to the localStorage, when the object changes, save it to localStorage
    register: (object_id_string, object_to_save) => {
        mem.get(object_id_string, object_to_save);
        watch(object_to_save, () => {mem.save(object_id_string,object_to_save.value );}, {deep: true,});
    }
}

export default mem;
