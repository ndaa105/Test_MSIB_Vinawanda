package com.example.demo.repository;

import org.springframework.data.jpa.repository.JpaRepository;

import com.example.demo.model.Lokasi;

public interface LokasiRepository extends JpaRepository<Lokasi, Long> {
}