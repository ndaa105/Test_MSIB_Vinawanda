package com.example.demo.controller;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.*;

import com.example.demo.model.Lokasi;
import com.example.demo.model.Proyek;
import com.example.demo.repository.LokasiRepository;
import com.example.demo.repository.ProyekRepository;

import java.util.List;

@RestController
@RequestMapping("/proyek")
public class ProyekController {

    @Autowired
    private ProyekRepository proyekRepository;

    @Autowired
    private LokasiRepository lokasiRepository;

    @PostMapping
    public Proyek createProyek(@RequestBody Proyek proyek) {
        Lokasi lokasi = lokasiRepository.findById(proyek.getLokasi().getId()).orElseThrow();
        proyek.setLokasi(lokasi);
        return proyekRepository.save(proyek);
    }

    @GetMapping
    public List<Proyek> getAllProyek() {
        return proyekRepository.findAll();
    }

    @PutMapping("/{id}")
    public Proyek updateProyek(@PathVariable Long id, @RequestBody Proyek proyekDetails) {
        Proyek proyek = proyekRepository.findById(id).orElseThrow();
        proyek.setNamaProyek(proyekDetails.getNamaProyek());
        proyek.setLokasi(proyekDetails.getLokasi());
        return proyekRepository.save(proyek);
    }

    @DeleteMapping("/{id}")
    public void deleteProyek(@PathVariable Long id) {
        Proyek proyek = proyekRepository.findById(id).orElseThrow();
        proyekRepository.delete(proyek);
    }
}
