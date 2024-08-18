package com.example.demo.repository;

import org.springframework.data.jpa.repository.JpaRepository;

import com.example.demo.model.Proyek;

public interface ProyekRepository extends JpaRepository<Proyek, Long> {
}
