new Vue({
    el: '#crud',
    created: function() {
        this.getKeeps();
    },
    data: {
        keeps: [],
        pagination: {
            'total': 0,
            'current_page': 0,
            'per_page': 0,
            'last_page': 0,
            'from': 0,
            'to': 0,
        },
        keep: '',
        description: '',
        nameKeep: '',
        descripKeep: '',
        fillKeep: {'id': '', 'keep': '', 'description': '', 'status': '', 'created_at': ''},
        errors: [],
        offset: 2,
        numId: 0,
    },
    methods: {
        getKeeps: function(page) {
            var urlKeeps = 'tasks?page='+page;
            axios.get(urlKeeps).then(response => {
                this.keeps = response.data
                this.pagination = response.data.pagination
            });
        },
        showKeep: function(keep){
            this.fillKeep.id = keep.id;
            this.fillKeep.keep = keep.keep;
            this.fillKeep.description = keep.description;
            this.fillKeep.status = keep.status;
            this.fillKeep.created_at = keep.created_at;
            $('#show').modal('show');
        },
        createKeep: function(){
            var createURL = 'tasks';
            axios.post(createURL, {
                keep: this.nameKeep,
                description: this.descripKeep
            }).then(response => {
                this.getKeeps();
                this.nameKeep = '';
                this.descripKeep = '';
                this.errors = [];
                $('#create').modal('hide');
                toastr.success('Nueva tarea creada con éxito');
            }).catch(error => {
                this.errors = error.response.data
            });
        },
        editKeep: function(keep) {
            this.fillKeep.id = keep.id;
            this.fillKeep.keep = keep.keep;
            this.fillKeep.description = keep.description;
            this.fillKeep.status = keep.status;
            $('#edit').modal('show');
        },
        updateKeep: function(id){
            var updateURL = 'tasks/' + id;
            axios.put(updateURL, this.fillKeep).then(response => {
                this.getKeeps();
                this.fillKeep = {'id': '', 'keep': '', 'description': '', 'status': ''};
                this.errors = [];
                $('#edit').modal('hide');
                toastr.success('Tarea actualizada con éxito');
            }).catch(error => {
                this.errors = error.response.data
            });
        },
        deleteKeep: function(keep){
            var deleteURL = 'tasks/' + keep.id;
            axios.delete(deleteURL).then(response => {
                this.getKeeps();
                toastr.success('Eliminado correctamente');
            });
        },
        changePage: function(page){
            this.pagination.current_page = page;
            this.getKeeps(page);
        },
        since: function(d) {
            return moment(d).fromNow();
        }
    },
    computed: {
        isActived: function(){
            return this.pagination.current_page;
        },
        pagesNumber: function(){
            if(!this.pagination.to){
                return [];
            }
            var from = this.pagination.current_page - this.offset;
            if(from < 1){
                from = 1;
            }
            var to = from + (this.offset * 2);
            if(to >= this.pagination.last_page){
                to = this.pagination.last_page;
            }
            var pagesArray = [];
            while(from <= to){
                pagesArray.push(from);
                from++;
            }
            return pagesArray;
        }
    }
});