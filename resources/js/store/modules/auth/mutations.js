export default {

    login(store, payload){
        store.first_name = payload.first_name;
        store.last_name = payload.last_name
        store.sur_name = payload.sur_name
        store.email = payload.email;
        store.id_role = payload.id_role;
        store.id_user = payload.id_user
    }
}
