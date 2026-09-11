from openpyxl import Workbook

valid_amino_acids = set("ARNDCEQGHILKMFPSTWYV")

# input file, output file, min length, max length
files_config = [
    ("MHC1.txt", "MHC1_clean.txt", 8, 13),
    ("MHC2.txt", "MHC2_clean.txt", 13, 25),
    ("BCell.txt", "BCell_clean.txt", 5, 25),
]

summary_file = "cleaning_summary.xlsx"

def clean_file(input_file, output_file, min_len, max_len):
    kept = 0
    total = 0
    with open(input_file, "r") as infile, open(output_file, "w") as outfile:
        for line in infile:
            sequence = line.strip().upper()

            # Skip empty lines
            if not sequence:
                continue

            total += 1

            # Remove sequences containing non-standard amino acids
            if not set(sequence).issubset(valid_amino_acids):
                continue

            # Keep only sequences within the allowed length range
            if not min_len <= len(sequence) <= max_len:
                continue

            outfile.write(sequence + "\n")
            kept += 1

    removed = total - kept
    print(f"{input_file}: {kept} kept, {removed} removed -> {output_file}")
    return kept, removed

# Build a simple summary table: File, Kept, Removed
wb = Workbook()
ws = wb.active
ws.title = "Summary"
ws.append(["File", "Kept", "Removed", "Kept %", "Removed %"])

for input_file, output_file, min_len, max_len in files_config:
    kept, removed = clean_file(input_file, output_file, min_len, max_len)
    total = kept + removed
    kept_pct = kept / total if total else 0
    removed_pct = removed / total if total else 0
    ws.append([input_file, kept, removed, kept_pct, removed_pct])
    ws.cell(row=ws.max_row, column=4).number_format = "0.0%"
    ws.cell(row=ws.max_row, column=5).number_format = "0.0%"

wb.save(summary_file)

print("Done!")