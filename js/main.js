import generalform from "./components/TheGeneralForm.js";
import juniorform from "./components/TheJuniorForm.js";
import memberform from "./components/TheMemberForm.js";

import { fetchData } from "./components/DataMiner.js";

(() => {

    let vue_vm = new Vue({
        data: {
            announcements:[],
            images: [],
            currentImg:{},
            imgIndex: null,
            showLightbox: false,
            showDropdown: false,
            showTheNav: false,
            showTheSubjects: false,
            currentForm: {
                type: "generalform",
                name: "General Inquiry"
            },
            formStatus: {error: false, message:''}
        },

        mounted: function () {
            fetchData("./admin/announcements/get_announcements.php")
            .then(data => {
                console.log(data)
                data.forEach(announcement => {
                    this.announcements.push(announcement);
                });
            })
            .catch(err => console.error(err));

            fetchData("./admin/content/get_content.php")
                .then(data => {
                    data.forEach(image => {
                        this.images.push(image);
                    });
                })
                .catch(err => console.error(err));
        },

        updated: function() {
        },


        methods: {
            expandImg(target, index) {
                this.showLightbox = this.showLightbox ? false : true;
                this.currentImg = target;
                this.imgIndex = index;
            },
            prevImg(){
                this.imgIndex --;
                if(this.imgIndex < 0){
                    this.imgIndex = this.images.length - 1;
                }
                this.currentImg = this.images[this.imgIndex];
            },
            nextImg(){
                this.imgIndex ++;
                if (this.imgIndex >= this.images.length - 1) {
                    this.imgIndex = 0;
                }
                this.currentImg = this.images[this.imgIndex];
            },
            dropdownToggle(){
                this.showDropdown = this.showDropdown ? false : true;
            },
            showNav() {
                this.showTheNav = this.showTheNav ? false : true;
            },
            showSubjects() {
                this.showTheSubjects = this.showTheSubjects ? false : true;
            },
            inputFill(e){

                let thisLabel = e.target.labels[0];
                if(e.target.value){
                    thisLabel.classList.add('filled');
                } else {
                    thisLabel.classList.remove('filled');
                }
            },
            formType(){
                let formType = this.$refs.subject.options;
                this.currentForm.name = `${formType[formType.selectedIndex].innerText}`;
            },
        },

        components: {
            generalform,
            juniorform,
            memberform
        },
        computed:{
            currentFormComponent: function () {
                return this.currentForm.type;
            }
        }

    }).$mount("#app");

//* ________________Parallax _________________

var scenes = document.querySelectorAll('.scene');
scenes.forEach(scene => {
    let parallaxInstance = new Parallax(scene);
});

//* ________________Scroll In _________________

    let angleImgLeft = document.querySelectorAll('.left');
    angleImgLeft.forEach(img => {
        gsap.to(img, {
            scrollTrigger: img,
            opacity:1,
            left: 0
        });
    });

    let angleImgRight = document.querySelectorAll('.angle-img.right');
    angleImgRight.forEach(img => {
        gsap.to(img, {
            scrollTrigger: img,
            opacity:1,
            right: 0
        });
    });



})();