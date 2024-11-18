package com.example.connecttojson;

import java.io.Serializable;

public class ModelPelanggan {
        private String id;
        private String nama;
        private String alamat;
        private String hp;

        // Constructor tanpa parameter (dibutuhkan di PelangganAddActivity)
        public ModelPelanggan() {}

        // Constructor dengan parameter
        public ModelPelanggan(String id, String nama, String alamat, String hp) {
            this.id = id;
            this.nama = nama;
            this.alamat = alamat;
            this.hp = hp;
        }

        // Getter dan Setter untuk setiap atribut
        public String getId() {
            return id;
        }

        public void setId(String id) {
            this.id = id;
        }

        public String getNama() {
            return nama;
        }

        public void setNama(String nama) {
            this.nama = nama;
        }

        public String getAlamat() {
            return alamat;
        }

        public void setAlamat(String alamat) {
            this.alamat = alamat;
        }

        public String getHp() {
            return hp;
        }

        public void setHp(String hp) {
            this.hp = hp;
        }
    }

