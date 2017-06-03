foreach ($boats as &$$boat) {
    unset($boat->generated_html);
}
echo json_encode(compact('boats'));