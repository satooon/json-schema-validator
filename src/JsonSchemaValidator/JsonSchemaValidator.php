<?php namespace Satooon\JsonSchemaValidator;

class JsonSchemaValidator
{
    public static function validate($data, $schemaFile = '')
    {
        if (\Config::get('json-schema-validator::config.run') === false) {
            return;
        }

        if (! empty($schemaFile)) {
            $retriever = new \JsonSchema\Uri\UriRetriever;
            $path = \Config::get('json-schema-validator::config.schemaDir').'/response/'.$schemaFile;
            $schema = $retriever->retrieve('file://' . $path);

            $validator = new \JsonSchema\Validator();
            $validator->check($data, $schema);

            return $validator->isValid();
        }

        return true;
    }
}