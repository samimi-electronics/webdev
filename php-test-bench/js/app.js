const app = new Vue({
    el: '#app',
    data:{
        forms:[
            {
                fname: '',
                lname: '',
                radioVal: '',
                image: ''
            }
        ]
    },
    methods:{
        addFormEntry(e){
            e.preventDefault();
            this.forms.push({
                fname: '',
                lname: '',
                radioVal: '',
                image: '',
            });
        },
        removeFormEntry(index){
            if(this.forms.length > 1)
                this.forms.splice(index, 1);
        },
        onSubmit(e){
            e.preventDefault();
            let fd = new FormData();
            for(let i = 0; i < this.forms.length; i++){
                fd.append('numOfEntries', i + 1);
                fd.append('fname-' + i, this.forms[i].fname);
                fd.append('lname-' + i, this.forms[i].lname);
                fd.append('radioVal-' + i, this.forms[i].radioVal);
                fd.append('image-' + i, this.forms[i].image);
            }
            axios.post('api.php', fd)
            .then(res => console.log(res))
            .catch(err => console.log(err));
        },
        onImageSelect(e){
            // Get form index of pressed file input button
            const index = e.target.dataset.index;
            this.forms[index].image = e.target.files[0];
        }
    }
});