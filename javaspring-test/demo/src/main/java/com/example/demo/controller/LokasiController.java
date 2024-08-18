package com.example.demo.controller;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.*;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.RestController;

import com.example.demo.model.Lokasi;
import com.example.demo.repository.LokasiRepository;

import java.util.List;

@RestController
@RequestMapping("/lokasi")
public class LokasiController {

    @Autowired
    private LokasiRepository lokasiRepository;

    @PostMapping
    public Lokasi createLokasi(@RequestBody Lokasi lokasi) {
        return lokasiRepository.save(lokasi);
    }

    @GetMapping
    public List<Lokasi> getAllLokasi() {
        return lokasiRepository.findAll();
    }

    @PutMapping("/{id}")
    public Lokasi updateLokasi(@PathVariable Long id, @RequestBody Lokasi lokasiDetails) {
        Lokasi lokasi = lokasiRepository.findById(id).orElseThrow();
        lokasi.setNamaLokasi(lokasiDetails.getNamaLokasi());
        lokasi.setAlamat(lokasiDetails.getAlamat());
        return lokasiRepository.save(lokasi);
    }

    @DeleteMapping("/{id}")
    public void deleteLokasi(@PathVariable Long id) {
        Lokasi lokasi = lokasiRepository.findById(id).orElseThrow();
        lokasiRepository.delete(lokasi);
    }
}
