<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Barang extends Seeder
{
    public function run()
    {
        $now = date('Y-m-d H:i:s');
        $listJenisBarang = [
            ['id' => 'HT', 'nama' => 'Handy Talkie', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'EP', 'nama' => 'Earphone', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'KO', 'nama' => 'Kabel Olor', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'TOA', 'nama' => 'Toa', 'created_at' => $now, 'updated_at' => $now],
        ];
        $listBarang = [
            ['id' => 'HT-001', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-002', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-003', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-004', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-005', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-006', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-007', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-008', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-009', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-010', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-011', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-012', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-013', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-014', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-015', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-016', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-017', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-018', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-019', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-020', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-021', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-022', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-023', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-024', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-025', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-026', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-027', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-028', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-029', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-030', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-031', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-032', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-033', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-034', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-035', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-036', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-037', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-038', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-039', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-040', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-041', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-042', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-043', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-044', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-045', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-046', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-047', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-048', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-049', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-050', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-051', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-052', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-053', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-054', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-055', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-056', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-057', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-058', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-059', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-060', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-061', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-062', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-063', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-064', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-065', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-066', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-067', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-068', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-069', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-070', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-071', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-072', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-073', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-074', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-075', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-076', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-077', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-078', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-079', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-080', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-081', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-082', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-083', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-084', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-085', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-086', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-087', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-088', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-089', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-090', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-091', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-092', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-093', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-094', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-095', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-096', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-097', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-098', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-099', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-100', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-101', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-102', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-103', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-104', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-105', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-106', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-107', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-108', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-109', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-110', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-111', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-112', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-113', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-114', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-115', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-116', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-117', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-118', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-119', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-120', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-121', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-122', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-123', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-124', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-125', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-126', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-127', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-128', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-129', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-130', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-131', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-132', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-133', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-134', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-135', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-136', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-137', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-138', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-139', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-140', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-141', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-142', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-143', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-144', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-145', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-146', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-147', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-148', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-149', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-150', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-151', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-152', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-153', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-154', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-155', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-156', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-157', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-158', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-159', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-160', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-161', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-162', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-163', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-164', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-165', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-166', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-167', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-168', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-169', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-170', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-171', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-172', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-173', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-174', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-175', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-176', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-177', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-178', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-179', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-180', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-181', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-182', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-183', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-184', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-185', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-186', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-187', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-188', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-189', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-190', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-191', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-192', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-193', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-194', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-195', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-196', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-197', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-198', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-199', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-200', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-201', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-202', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-203', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-204', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-205', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'HT-206', 'id_jenis_barang' => 'HT', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'EP-001', 'id_jenis_barang' => 'EP', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'EP-002', 'id_jenis_barang' => 'EP', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'EP-003', 'id_jenis_barang' => 'EP', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'EP-004', 'id_jenis_barang' => 'EP', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'EP-005', 'id_jenis_barang' => 'EP', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'EP-006', 'id_jenis_barang' => 'EP', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'EP-007', 'id_jenis_barang' => 'EP', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'EP-008', 'id_jenis_barang' => 'EP', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'EP-009', 'id_jenis_barang' => 'EP', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'EP-010', 'id_jenis_barang' => 'EP', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'EP-011', 'id_jenis_barang' => 'EP', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'EP-012', 'id_jenis_barang' => 'EP', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'EP-013', 'id_jenis_barang' => 'EP', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'EP-014', 'id_jenis_barang' => 'EP', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'EP-015', 'id_jenis_barang' => 'EP', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'EP-016', 'id_jenis_barang' => 'EP', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'EP-017', 'id_jenis_barang' => 'EP', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'EP-018', 'id_jenis_barang' => 'EP', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'EP-019', 'id_jenis_barang' => 'EP', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'EP-020', 'id_jenis_barang' => 'EP', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'EP-021', 'id_jenis_barang' => 'EP', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'EP-022', 'id_jenis_barang' => 'EP', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'EP-023', 'id_jenis_barang' => 'EP', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'EP-024', 'id_jenis_barang' => 'EP', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'EP-025', 'id_jenis_barang' => 'EP', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'EP-026', 'id_jenis_barang' => 'EP', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'EP-027', 'id_jenis_barang' => 'EP', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'EP-028', 'id_jenis_barang' => 'EP', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'EP-029', 'id_jenis_barang' => 'EP', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'EP-030', 'id_jenis_barang' => 'EP', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'EP-031', 'id_jenis_barang' => 'EP', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'EP-032', 'id_jenis_barang' => 'EP', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'EP-033', 'id_jenis_barang' => 'EP', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'EP-034', 'id_jenis_barang' => 'EP', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'EP-035', 'id_jenis_barang' => 'EP', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'EP-036', 'id_jenis_barang' => 'EP', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'EP-037', 'id_jenis_barang' => 'EP', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'EP-038', 'id_jenis_barang' => 'EP', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'EP-039', 'id_jenis_barang' => 'EP', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'EP-040', 'id_jenis_barang' => 'EP', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'EP-041', 'id_jenis_barang' => 'EP', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'EP-042', 'id_jenis_barang' => 'EP', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'EP-043', 'id_jenis_barang' => 'EP', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'EP-044', 'id_jenis_barang' => 'EP', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'EP-045', 'id_jenis_barang' => 'EP', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'EP-046', 'id_jenis_barang' => 'EP', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'EP-047', 'id_jenis_barang' => 'EP', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'EP-048', 'id_jenis_barang' => 'EP', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'EP-049', 'id_jenis_barang' => 'EP', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'EP-050', 'id_jenis_barang' => 'EP', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'EP-051', 'id_jenis_barang' => 'EP', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'EP-052', 'id_jenis_barang' => 'EP', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'EP-053', 'id_jenis_barang' => 'EP', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'EP-054', 'id_jenis_barang' => 'EP', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'EP-055', 'id_jenis_barang' => 'EP', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'EP-056', 'id_jenis_barang' => 'EP', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'EP-057', 'id_jenis_barang' => 'EP', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'EP-058', 'id_jenis_barang' => 'EP', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'EP-059', 'id_jenis_barang' => 'EP', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'EP-060', 'id_jenis_barang' => 'EP', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'EP-061', 'id_jenis_barang' => 'EP', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'EP-062', 'id_jenis_barang' => 'EP', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'EP-063', 'id_jenis_barang' => 'EP', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'EP-064', 'id_jenis_barang' => 'EP', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'EP-065', 'id_jenis_barang' => 'EP', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'EP-066', 'id_jenis_barang' => 'EP', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'EP-067', 'id_jenis_barang' => 'EP', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'EP-068', 'id_jenis_barang' => 'EP', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'EP-069', 'id_jenis_barang' => 'EP', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'EP-070', 'id_jenis_barang' => 'EP', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'EP-071', 'id_jenis_barang' => 'EP', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'EP-072', 'id_jenis_barang' => 'EP', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'EP-073', 'id_jenis_barang' => 'EP', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'EP-074', 'id_jenis_barang' => 'EP', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'EP-075', 'id_jenis_barang' => 'EP', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'EP-076', 'id_jenis_barang' => 'EP', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'EP-077', 'id_jenis_barang' => 'EP', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'EP-078', 'id_jenis_barang' => 'EP', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'EP-079', 'id_jenis_barang' => 'EP', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'EP-080', 'id_jenis_barang' => 'EP', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'EP-081', 'id_jenis_barang' => 'EP', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'EP-082', 'id_jenis_barang' => 'EP', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'EP-083', 'id_jenis_barang' => 'EP', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'EP-084', 'id_jenis_barang' => 'EP', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'EP-085', 'id_jenis_barang' => 'EP', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'EP-086', 'id_jenis_barang' => 'EP', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'EP-087', 'id_jenis_barang' => 'EP', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'EP-088', 'id_jenis_barang' => 'EP', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'EP-089', 'id_jenis_barang' => 'EP', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'EP-090', 'id_jenis_barang' => 'EP', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'EP-091', 'id_jenis_barang' => 'EP', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'EP-092', 'id_jenis_barang' => 'EP', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'EP-093', 'id_jenis_barang' => 'EP', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'EP-094', 'id_jenis_barang' => 'EP', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'EP-095', 'id_jenis_barang' => 'EP', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'EP-096', 'id_jenis_barang' => 'EP', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'EP-097', 'id_jenis_barang' => 'EP', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'EP-098', 'id_jenis_barang' => 'EP', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'EP-099', 'id_jenis_barang' => 'EP', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'EP-100', 'id_jenis_barang' => 'EP', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'EP-101', 'id_jenis_barang' => 'EP', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'EP-102', 'id_jenis_barang' => 'EP', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'EP-103', 'id_jenis_barang' => 'EP', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'EP-104', 'id_jenis_barang' => 'EP', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'EP-105', 'id_jenis_barang' => 'EP', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'EP-106', 'id_jenis_barang' => 'EP', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'EP-107', 'id_jenis_barang' => 'EP', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'EP-108', 'id_jenis_barang' => 'EP', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'EP-109', 'id_jenis_barang' => 'EP', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'EP-110', 'id_jenis_barang' => 'EP', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'EP-111', 'id_jenis_barang' => 'EP', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'EP-112', 'id_jenis_barang' => 'EP', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'EP-113', 'id_jenis_barang' => 'EP', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'EP-114', 'id_jenis_barang' => 'EP', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'EP-115', 'id_jenis_barang' => 'EP', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'EP-116', 'id_jenis_barang' => 'EP', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'EP-117', 'id_jenis_barang' => 'EP', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'EP-118', 'id_jenis_barang' => 'EP', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'EP-119', 'id_jenis_barang' => 'EP', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'EP-120', 'id_jenis_barang' => 'EP', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'EP-121', 'id_jenis_barang' => 'EP', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'EP-122', 'id_jenis_barang' => 'EP', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'EP-123', 'id_jenis_barang' => 'EP', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'EP-124', 'id_jenis_barang' => 'EP', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'EP-125', 'id_jenis_barang' => 'EP', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'EP-126', 'id_jenis_barang' => 'EP', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'EP-127', 'id_jenis_barang' => 'EP', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'EP-128', 'id_jenis_barang' => 'EP', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'EP-129', 'id_jenis_barang' => 'EP', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'TOA-001', 'id_jenis_barang' => 'TOA', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'TOA-002', 'id_jenis_barang' => 'TOA', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'TOA-003', 'id_jenis_barang' => 'TOA', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'TOA-004', 'id_jenis_barang' => 'TOA', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'TOA-005', 'id_jenis_barang' => 'TOA', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'KO-001', 'id_jenis_barang' => 'KO', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'KO-002', 'id_jenis_barang' => 'KO', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'KO-003', 'id_jenis_barang' => 'KO', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'KO-004', 'id_jenis_barang' => 'KO', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 'KO-005', 'id_jenis_barang' => 'KO', 'created_at' => $now, 'updated_at' => $now],
        ];

        $this->db->table('jenis_barang')
            ->insertBatch($listJenisBarang);
            
        $this->db->table('barang')
            ->insertBatch($listBarang);
    }
}