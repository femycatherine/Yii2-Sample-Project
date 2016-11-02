<?php 
namespace app\models;
/**
 * 
 */
class ErrorBean
{

    /**
     * (no documentation provided)
     *
     * @var integer
     */
    private $status;

    /**
     * (no documentation provided)
     *
     * @var string
     */
    private $message;

    /**
     * Constructs a ErrorBean from a (parsed) JSON hash
     *
     * @param mixed $o Either an array (JSON) or an XMLReader.
     */
    public function __construct($o = null)
    {
        if (is_array($o)) {
            $this->initFromArray($o);
        }
        else if ($o instanceof \XMLReader) {
            $success = true;
            while ($success && $o->nodeType != \XMLReader::ELEMENT) {
                $success = $o->read();
            }
            if ($o->nodeType != \XMLReader::ELEMENT) {
                throw new \Exception("Unable to read XML: no start element found.");
            }

            $this->initFromReader($o);
        }
    }

    /**
     * (no documentation provided)
     *
     * @return integer
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * (no documentation provided)
     *
     * @param integer $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }
    /**
     * (no documentation provided)
     *
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * (no documentation provided)
     *
     * @param string $message
     */
    public function setMessage($message)
    {
        $this->message = $message;
    }
    /**
     * Returns the associative array for this ErrorBean
     *
     * @return array
     */
    public function toArray()
    {
        $a = array();
        if ($this->status) {
            $a["status"] = $this->status;
        }
        if ($this->message) {
            $a["message"] = $this->message;
        }
        return $a;
    }

    /**
     * Returns the JSON string for this ErrorBean
     *
     * @return string
     */
    public function toJson()
    {
        return json_encode($this->toArray());
    }

    /**
     * Initializes this ErrorBean from an associative array
     *
     * @param array $o
     */
    public function initFromArray($o)
    {
        if (isset($o['status'])) {
            $this->status = $o["status"];
        }
        if (isset($o['message'])) {
            $this->message = $o["message"];
        }
    }

    /**
     * Initializes this ErrorBean from an XML reader.
     *
     * @param \XMLReader $xml The reader to use to initialize this object.
     */
    public function initFromReader($xml)
    {
        $empty = $xml->isEmptyElement;

        if ($xml->hasAttributes) {
            $moreAttributes = $xml->moveToFirstAttribute();
            while ($moreAttributes) {
                if (!$this->setKnownAttribute($xml)) {
                    //skip unknown attributes...
                }
                $moreAttributes = $xml->moveToNextAttribute();
            }
        }

        if (!$empty) {
            $xml->read();
            while ($xml->nodeType != \XMLReader::END_ELEMENT) {
                if ($xml->nodeType != \XMLReader::ELEMENT) {
                    //no-op: skip any insignificant whitespace, comments, etc.
                }
                else if (!$xml->isEmptyElement && !$this->setKnownChildElement($xml)) {
                    $n = $xml->localName;
                    $ns = $xml->namespaceURI;
                    //skip the unknown element
                    while ($xml->nodeType != \XMLReader::END_ELEMENT && $xml->localName != $n && $xml->namespaceURI != $ns) {
                        $xml->read();
                    }
                }
                $xml->read(); //advance the reader.
            }
        }
    }


    /**
     * Sets a known child element of ErrorBean from an XML reader.
     *
     * @param \XMLReader $xml The reader.
     * @return bool Whether a child element was set.
     */
    protected function setKnownChildElement($xml) {
        $happened = false;
        if (($xml->localName == 'status') && (empty($xml->namespaceURI))) {
            $child = '';
            while ($xml->read() && $xml->hasValue) {
                $child = $child . $xml->value;
            }
            $this->status = $child;
            $happened = true;
        }
        else if (($xml->localName == 'message') && (empty($xml->namespaceURI))) {
            $child = '';
            while ($xml->read() && $xml->hasValue) {
                $child = $child . $xml->value;
            }
            $this->message = $child;
            $happened = true;
        }
        return $happened;
    }

    /**
     * Sets a known attribute of ErrorBean from an XML reader.
     *
     * @param \XMLReader $xml The reader.
     * @return bool Whether an attribute was set.
     */
    protected function setKnownAttribute($xml) {

        return false;
    }

    /**
     * Writes this ErrorBean to an XML writer.
     *
     * @param \XMLWriter $writer The XML writer.
     * @param bool $includeNamespaces Whether to write out the namespaces in the element.
     */
    public function toXml($writer, $includeNamespaces = true)
    {
        $writer->startElementNS(null, 'errorBean', null);
        $this->writeXmlContents($writer);
        $writer->endElement();
    }

    /**
     * Writes the contents of this ErrorBean to an XML writer. The startElement is expected to be already provided.
     *
     * @param \XMLWriter $writer The XML writer.
     */
    public function writeXmlContents($writer)
    {
        if ($this->status) {
            $writer->startElementNs(null, 'status', null);
            $writer->text($this->status);
            $writer->endElement();
        }
        if ($this->message) {
            $writer->startElementNs(null, 'message', null);
            $writer->text($this->message);
            $writer->endElement();
        }
    }
}

namespace app\models;

/**
 * 
 */
class Results
{

    /**
     * (no documentation provided)
     *
     * @var string
     */
    private $href;

    /**
     * (no documentation provided)
     *
     * @var integer
     */
    private $status;

    /**
     * Constructs a Results from a (parsed) JSON hash
     *
     * @param mixed $o Either an array (JSON) or an XMLReader.
     */
    public function __construct($o = null)
    {
        if (is_array($o)) {
            $this->initFromArray($o);
        }
        else if ($o instanceof \XMLReader) {
            $success = true;
            while ($success && $o->nodeType != \XMLReader::ELEMENT) {
                $success = $o->read();
            }
            if ($o->nodeType != \XMLReader::ELEMENT) {
                throw new \Exception("Unable to read XML: no start element found.");
            }

            $this->initFromReader($o);
        }
    }

    /**
     * (no documentation provided)
     *
     * @return string
     */
    public function getHref()
    {
        return $this->href;
    }

    /**
     * (no documentation provided)
     *
     * @param string $href
     */
    public function setHref($href)
    {
        $this->href = $href;
    }
    /**
     * (no documentation provided)
     *
     * @return integer
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * (no documentation provided)
     *
     * @param integer $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }
    /**
     * Returns the associative array for this Results
     *
     * @return array
     */
    public function toArray()
    {
        $a = array();
        if ($this->href) {
            $a["href"] = $this->href;
        }
        if ($this->status) {
            $a["status"] = $this->status;
        }
        return $a;
    }

    /**
     * Returns the JSON string for this Results
     *
     * @return string
     */
    public function toJson()
    {
        return json_encode($this->toArray());
    }

    /**
     * Initializes this Results from an associative array
     *
     * @param array $o
     */
    public function initFromArray($o)
    {
        if (isset($o['href'])) {
            $this->href = $o["href"];
        }
        if (isset($o['status'])) {
            $this->status = $o["status"];
        }
    }

    /**
     * Initializes this Results from an XML reader.
     *
     * @param \XMLReader $xml The reader to use to initialize this object.
     */
    public function initFromReader($xml)
    {
        $empty = $xml->isEmptyElement;

        if ($xml->hasAttributes) {
            $moreAttributes = $xml->moveToFirstAttribute();
            while ($moreAttributes) {
                if (!$this->setKnownAttribute($xml)) {
                    //skip unknown attributes...
                }
                $moreAttributes = $xml->moveToNextAttribute();
            }
        }

        if (!$empty) {
            $xml->read();
            while ($xml->nodeType != \XMLReader::END_ELEMENT) {
                if ($xml->nodeType != \XMLReader::ELEMENT) {
                    //no-op: skip any insignificant whitespace, comments, etc.
                }
                else if (!$xml->isEmptyElement && !$this->setKnownChildElement($xml)) {
                    $n = $xml->localName;
                    $ns = $xml->namespaceURI;
                    //skip the unknown element
                    while ($xml->nodeType != \XMLReader::END_ELEMENT && $xml->localName != $n && $xml->namespaceURI != $ns) {
                        $xml->read();
                    }
                }
                $xml->read(); //advance the reader.
            }
        }
    }


    /**
     * Sets a known child element of Results from an XML reader.
     *
     * @param \XMLReader $xml The reader.
     * @return bool Whether a child element was set.
     */
    protected function setKnownChildElement($xml) {
        $happened = false;
        if (($xml->localName == 'href') && (empty($xml->namespaceURI))) {
            $child = '';
            while ($xml->read() && $xml->hasValue) {
                $child = $child . $xml->value;
            }
            $this->href = $child;
            $happened = true;
        }
        else if (($xml->localName == 'status') && (empty($xml->namespaceURI))) {
            $child = '';
            while ($xml->read() && $xml->hasValue) {
                $child = $child . $xml->value;
            }
            $this->status = $child;
            $happened = true;
        }
        return $happened;
    }

    /**
     * Sets a known attribute of Results from an XML reader.
     *
     * @param \XMLReader $xml The reader.
     * @return bool Whether an attribute was set.
     */
    protected function setKnownAttribute($xml) {

        return false;
    }

    /**
     * Writes this Results to an XML writer.
     *
     * @param \XMLWriter $writer The XML writer.
     * @param bool $includeNamespaces Whether to write out the namespaces in the element.
     */
    public function toXml($writer, $includeNamespaces = true)
    {
        $writer->startElementNS(null, 'results', null);
        $this->writeXmlContents($writer);
        $writer->endElement();
    }

    /**
     * Writes the contents of this Results to an XML writer. The startElement is expected to be already provided.
     *
     * @param \XMLWriter $writer The XML writer.
     */
    public function writeXmlContents($writer)
    {
        if ($this->href) {
            $writer->startElementNs(null, 'href', null);
            $writer->text($this->href);
            $writer->endElement();
        }
        if ($this->status) {
            $writer->startElementNs(null, 'status', null);
            $writer->text($this->status);
            $writer->endElement();
        }
    }
}
