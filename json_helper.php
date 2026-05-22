<?php

define('JSON_FILE', 'data.json');

# =========================
# LIRE TOUT
# =========================
function json_all()
{
    if (!file_exists(JSON_FILE)) {
        return [];
    }

    $data = json_decode(file_get_contents(JSON_FILE), true);
    return $data ?? [];
}

# =========================
# SAUVEGARDER
# =========================
function json_save($data)
{
    return file_put_contents(
        JSON_FILE,
        json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE)
    );
}

# =========================
# AJOUTER (avec ID auto)
# =========================
function json_add($item)
{
    $data = json_all();
    // générer un ID auto-incrémenté
    $lastId = 0;
    foreach ($data as $d) {
        if (isset($d['id']) && $d['id'] > $lastId) {
            $lastId = $d['id'];
        }
    }
    $item['id'] = $lastId + 1;
    $data[] = $item;
    return json_save($data);
}

# =========================
# SUPPRIMER PAR ID
# =========================
function json_delete($id)
{
    $data = json_all();
    $data = array_filter($data, function ($item) use ($id) {
        return isset($item['id']) && $item['id'] != $id;
    });
    return json_save(array_values($data));
}

# =========================
# MODIFIER PAR ID
# =========================
function json_update($id, $newData)
{
    $data = json_all();
    foreach ($data as &$item) {
        if (isset($item['id']) && $item['id'] == $id) {
            $newData['id'] = $id; // garder l'ID
            $item = $newData;
            return json_save($data);
        }
    }

    return false;
}

# =========================
# RECHERCHE PAR NOM (contains)
# =========================
function json_search_by_name($name)
{
    $data = json_all();

    return array_values(array_filter($data, function ($item) use ($name) {
        return isset($item['nom']) &&
               stripos($item['nom'], $name) !== false;
    }));
}

# =========================
# TROUVER PAR ID
# =========================
function json_find_by_id($id)
{
    $data = json_all();

    foreach ($data as $item) {
        if (isset($item['id']) && $item['id'] == $id) {
            return $item;
        }
    }

    return null;
}

# =========================
# VIDER LE FICHIER
# =========================
function json_clear()
{
    return file_put_contents(JSON_FILE, "[]");
}

# =========================
# COMPTER ELEMENTS
# =========================
function json_count()
{
    return count(json_all());
}

# =========================
# RÉINITIALISER ID (optionnel)
# =========================
function json_reset_ids()
{
    $data = json_all();

    $i = 1;
    foreach ($data as &$item) {
        $item['id'] = $i++;
    }

    return json_save($data);
}