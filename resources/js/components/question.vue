<template>
    <form action="" method="post" @submit.prevent="submit">
        <div class="form-group">
            <label for="subject">รายวิชา</label>
            <select
                name="subject"
                id="subject"
                class="form-control"
                :class="{
                    'is-invalid': $v.form.subject.$error || error.subject
                }"
                v-model.trim="$v.form.subject.$model"
            >
                <option value="null" disabled>โปรดเลือก...</option>
                <option
                    v-for="(subject, index) in subjects"
                    :key="index"
                    :value="subject.id"
                    >{{ subject.name }}</option
                >
            </select>
            <div class="invalid-feedback" v-if="error.subject">
                {{ error.subject[0] }}
            </div>
            <div class="invalid-feedback" v-if="!$v.form.subject.required">
                จำเป็นต้องเลือก
            </div>
        </div>

        <div class="form-group has-danger">
            <label for="question">คำถาม</label>
            <textarea
                name="question"
                id="question"
                class="form-control"
                @keyup="error.question = null"
                @keydown="error.question = null"
                :class="{
                    'is-invalid': $v.form.question.$error || error.question
                }"
                v-model.trim="$v.form.question.$model"
            ></textarea>
            <div class="invalid-feedback" v-if="error.question">
                {{ error.question[0] }}
            </div>
            <div class="invalid-feedback" v-if="!$v.form.question.required">
                จำเป็นต้องกรอก
            </div>
            <div class="invalid-feedback" v-if="!$v.form.question.minLength">
                กรอกอย่างน้อย
                {{ $v.form.question.$params.minLength.min }} ตัวอักษร
            </div>
            <div class="invalid-feedback" v-if="!$v.form.question.maxLength">
                กรอกได้ไม่เกิน
                {{ $v.form.question.$params.maxLength.max }} ตัวอักษร
            </div>
        </div>

        <div class="form-group">
            <label for="choice_1">คำตอบที่ 1</label>
            <input
                type="text"
                name="choice_1"
                id="choice_1"
                class="form-control"
                @keyup="error.choice_1 = null"
                @keydown="error.choice_1 = null"
                :class="{
                    'is-invalid': $v.form.choice_1.$error || error.choice_1
                }"
                v-model.trim="$v.form.choice_1.$model"
            />
            <div class="invalid-feedback" v-if="error.choice_1">
                {{ error.choice_1[0] }}
            </div>
            <div class="invalid-feedback" v-if="!$v.form.choice_1.required">
                จำเป็นต้องกรอก
            </div>
            <div class="invalid-feedback" v-if="!$v.form.choice_1.minLength">
                กรอกอย่างน้อย
                {{ $v.form.choice_1.$params.minLength.min }} ตัวอักษร
            </div>
            <div class="invalid-feedback" v-if="!$v.form.choice_1.maxLength">
                กรอกได้ไม่เกิน
                {{ $v.form.choice_1.$params.maxLength.max }} ตัวอักษร
            </div>
        </div>

        <div class="form-group">
            <label for="choice_2">คำตอบที่ 2</label>
            <input
                type="text"
                name="choice_2"
                id="choice_2"
                class="form-control"
                @keyup="error.choice_2 = null"
                @keydown="error.choice_2 = null"
                :class="{
                    'is-invalid': $v.form.choice_2.$error || error.choice_2
                }"
                v-model.trim="$v.form.choice_2.$model"
            />
            <div class="invalid-feedback" v-if="error.choice_2">
                {{ error.choice_2[0] }}
            </div>
            <div class="invalid-feedback" v-if="!$v.form.choice_2.required">
                จำเป็นต้องกรอก
            </div>
            <div class="invalid-feedback" v-if="!$v.form.choice_2.minLength">
                กรอกอย่างน้อย
                {{ $v.form.choice_2.$params.minLength.min }} ตัวอักษร
            </div>
            <div class="invalid-feedback" v-if="!$v.form.choice_2.maxLength">
                กรอกได้ไม่เกิน
                {{ $v.form.choice_2.$params.maxLength.max }} ตัวอักษร
            </div>
        </div>

        <div class="form-group">
            <label for="choice_3">คำตอบที่ 3</label>
            <input
                type="text"
                name="choice_3"
                id="choice_3"
                class="form-control"
                @keyup="error.choice_3 = null"
                @keydown="error.choice_3 = null"
                :class="{
                    'is-invalid': $v.form.choice_3.$error || error.choice_3
                }"
                v-model.trim="$v.form.choice_3.$model"
            />
            <div class="invalid-feedback" v-if="error.choice_3">
                {{ error.choice_3[0] }}
            </div>
            <div class="invalid-feedback" v-if="!$v.form.choice_3.required">
                จำเป็นต้องกรอก
            </div>
            <div class="invalid-feedback" v-if="!$v.form.choice_3.minLength">
                กรอกอย่างน้อย
                {{ $v.form.choice_3.$params.minLength.min }} ตัวอักษร
            </div>
            <div class="invalid-feedback" v-if="!$v.form.choice_3.maxLength">
                กรอกได้ไม่เกิน
                {{ $v.form.choice_3.$params.maxLength.max }} ตัวอักษร
            </div>
        </div>

        <div class="form-group">
            <label for="choice_4">คำตอบที่ 4</label>
            <input
                type="text"
                name="choice_4"
                id="choice_4"
                class="form-control"
                @keyup="error.choice_4 = null"
                @keydown="error.choice_4 = null"
                :class="{
                    'is-invalid': $v.form.choice_4.$error || error.choice_4
                }"
                v-model.trim="$v.form.choice_4.$model"
            />
            <div class="invalid-feedback" v-if="error.choice_4">
                {{ error.choice_4[0] }}
            </div>
            <div class="invalid-feedback" v-if="!$v.form.choice_4.required">
                จำเป็นต้องกรอก
            </div>
            <div class="invalid-feedback" v-if="!$v.form.choice_4.minLength">
                กรอกอย่างน้อย
                {{ $v.form.choice_4.$params.minLength.min }} ตัวอักษร
            </div>
            <div class="invalid-feedback" v-if="!$v.form.choice_4.maxLength">
                กรอกได้ไม่เกิน
                {{ $v.form.choice_4.$params.maxLength.max }} ตัวอักษร
            </div>
        </div>

        <div class="form-group">
            <label for="correct">คำตอบที่ถูกต้อง</label>
            <select
                name="correct"
                id="correct"
                class="form-control"
                :class="{
                    'is-invalid': $v.form.correct.$error || error.correct
                }"
                v-model.trim="$v.form.correct.$model"
            >
                <option value="null" disabled>โปรดเลือก...</option>
                <option value="1">ตัวเลือกที่ 1</option>
                <option value="2">ตัวเลือกที่ 2</option>
                <option value="3">ตัวเลือกที่ 3</option>
                <option value="4">ตัวเลือกที่ 4</option>
            </select>
            <div class="invalid-feedback" v-if="error.correct">
                {{ error.correct[0] }}
            </div>
            <div class="invalid-feedback" v-if="!$v.form.correct.required">
                จำเป็นต้องเลือก
            </div>
        </div>

        <div class="form-group text-center">
            <button class="btn btn-primary">ส่งข้อสอบ</button>
        </div>
    </form>
</template>

<script>
import axios from "axios";
import { required, minLength, maxLength } from "vuelidate/lib/validators";

export default {
    props: {
        subjects: {
            type: Array,
            required: true
        }
    },

    data: () => ({
        form: {
            subject: null,
            question: "",
            choice_1: "",
            choice_2: "",
            choice_3: "",
            choice_4: "",
            correct: null
        },

        error: {
            subject: null,
            question: null,
            choice_1: null,
            choice_2: null,
            choice_3: null,
            choice_4: null,
            correct: null
        }
    }),

    validations: {
        form: {
            subject: {
                required
            },
            question: {
                required,
                minLength: minLength(5),
                maxLength: maxLength(255)
            },
            choice_1: {
                required,
                minLength: minLength(1),
                maxLength: maxLength(255)
            },
            choice_2: {
                required,
                minLength: minLength(1),
                maxLength: maxLength(255)
            },
            choice_3: {
                required,
                minLength: minLength(1),
                maxLength: maxLength(255)
            },
            choice_4: {
                required,
                minLength: minLength(1),
                maxLength: maxLength(255)
            },
            correct: {
                required
            }
        }
    },

    methods: {
        submit() {
            this.$v.$touch();

            if (this.$v.$invalid) {
                console.log("Invalid Form");
            } else {
                this.post_question();
            }
        },

        async post_question() {
            try {
                const response = await axios.post("/api/question", this.form);
                console.log(response);

                if (response.data.success) {
                    this.resetForm();
                    this.$swal(
                        "สำเร็จ!",
                        "ข้อสอบของคุณถูกเพิ่มเข้าระบบแล้ว กรุณารอผู้ดูแลระบบตรวจสอบ!",
                        "success"
                    );
                } else {
                    this.error = { ...this.error, ...response.data.errors };
                }
            } catch (err) {
                this.$swal(
                    "OOOPs..!",
                    "มีข้อผิดพลาดเกิดขึ้น โปรดลองใหม่อีกครั้งภายหลัง!",
                    "success"
                );
                console.error(err);
            }
        },

        resetForm() {
            this.form = {
                question: "",
                choice_1: "",
                choice_2: "",
                choice_3: "",
                choice_4: "",
                correct: null
            };
            this.$v.$reset();
        }
    }
};
</script>
